<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatusEnum;
use App\Enums\PaymentMethodEnum;
use App\Enums\PaymentStatusEnum;
use App\Models\BookDetail;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\SchoolDetail;
use App\Traits\SessionTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    use SessionTrait;

    private $schoolDetails, $cart, $order, $orderItem, $bookDetail;

    public function __construct(
        SchoolDetail $schoolDetails,
        Cart $cart,
        Order $order,
        OrderItem $orderItem,
        BookDetail $bookDetail
    ) {
        $this->schoolDetails = $schoolDetails;
        $this->cart = $cart;
        $this->order = $order;
        $this->orderItem = $orderItem;
        $this->bookDetail = $bookDetail;
    }

    public function checkout(Request $request)
    {
        try {
            $adminSession = $this->getSchoolSession($request);
            $uuid = $adminSession['uuid'];
            $school = $this->schoolDetails->where('uuid', $uuid)->first();
            $cartItems = $this->cart->where('school_id', $school->id)->get();

            $order = $this->order->create([
                'school_id'      => $school->id,
                'payment_status' => PaymentStatusEnum::PENDING,
                'payment_method' => PaymentMethodEnum::CASH_ON_DELIVERED,
                'order_status'   => OrderStatusEnum::PENDING,
                'total_Amount'   => $cartItems->sum('total_price'),
            ]);

            foreach ($cartItems as $cartItem) {
                $this->orderItem->create([
                    'order_id' => $order->id,
                    'book_id'  => $cartItem->book_id,
                    'quantity' => $cartItem->quantity,
                    'price'    => $cartItem->price,
                    'subtotal' => $cartItem->total_price,
                ]);
            }

            $this->cart->where('school_id', $school->id)->delete();

            return response()->json(['message' => 'Checkout successful']);
        } catch (\Throwable $e) {
            Log::error('[OrderController][checkout] Error order placing ' . 'Request=' . $request . ', Exception=' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred during placing order.');
        }
    }

    public function orderListToAdmin(Request $request)
    {
        $status = null;
        $message = null;
        $orders = $this->order->get();
        return view('admin.order', compact('orders'))->render();
    }

    public function viewInvoiceToSchool(int $orderId)
    {
        $status = null;
        $message = null;
        $order = $this->order->where('id', $orderId, 'school')->first();
        if (!$order) {
        }
        $school = $order->school;
        $orderItems = $order->orderItems()->with('orderProduct')->get();
        return view('school.invoice', compact('order', 'orderItems', 'status', 'school', 'message'));
    }

    public function orderListToSchool(Request $request)
    {
        $status = null;
        
        $message = null;
        $adminSession = $this->getSchoolSession($request);
        $uuid = $adminSession['uuid'];
        $school = $this->schoolDetails->where('uuid', $uuid)->first();
        $orders = $this->order->where('school_id', $school->id)->get();

        return view('school.order', compact('orders'))->render();
    }

    public function updateStatus(Request $request)
    {
        $orderId = $request->input('orderId');
        $statusType = $request->input('statusType');
        $statusValue = $request->input('statusValue');

        $order = $this->order->find($orderId);

        switch ($statusType) {
            case 'paymentStatus':
                $order->payment_status = $statusValue;
                break;
            case 'paymentMethod':
                $order->payment_method = $statusValue;
                break;
            case 'orderStatus':
                $order->order_status = $statusValue;
                break;
            default:
                return response()->json(['error' => 'Invalid status type'], 400);
        }

        $order->save();

        return response()->json(['message' => 'Status updated successfully']);
    }
}
