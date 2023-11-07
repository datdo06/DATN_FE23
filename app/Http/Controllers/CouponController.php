<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCouponRequest;
use App\Models\Coupon;
use App\Repositories\Interface\CouponRepositoryInterface;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    private $couponRepository;

    public function __construct(CouponRepositoryInterface $couponRepository)
    {
        $this->couponRepository = $couponRepository;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->couponRepository->getCouponsDatatable($request);
        }
        return view('coupon.index');
    }

    public function create()
    {
        $view =  view('coupon.create')->render();

        return response()->json([
            'view' => $view,
        ]);
    }

    public function store(StoreCouponRequest $request)
    {
        $coupon = $this->couponRepository->store($request);
        return response()->json([
            'message' => 'success', 'Coupon ' . $coupon->name . ' created'
        ]);
    }

    public function edit(Coupon $coupon)
    {
        $view = view('coupon.edit', compact('coupon'))->render();

        return response()->json([
            'view' => $view,
        ]);
    }

    public function update(Coupon $coupon, StoreCouponRequest $request)
    {
        $coupon->update($request->all());
        return response()->json([
            'message' => 'success', 'Type ' . $coupon->coupon_name . ' udpated!'
        ]);
    }

    public function destroy(Coupon $coupon)
    {
        try {
            $coupon->delete();
            return response()->json([
                'message' => 'Type ' . $coupon->name . ' deleted!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Type ' . $coupon->name . ' cannot be deleted! Error Code:' . $e->errorInfo[1]
            ], 500);
        }
    }
}
