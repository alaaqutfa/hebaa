<?php
namespace App\Http\Controllers\Admin;

use App\Models\Donation;
use App\Models\DonationCampaign;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController
{
    public function index()
    {
        $donations = Donation::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->get();

        $totalAmount   = $donations->sum('amount');
        $messagesCount = $donations->whereNotNull('message')->count();
        $users         = User::where('is_admin', 0)->paginate(10);

        $campaignsStats = [
            'active'    => DonationCampaign::where('status', 'active')->count(),
            'inactive'  => DonationCampaign::where('status', 'inactive')->count(),
            'completed' => DonationCampaign::where('status', 'completed')->count(),
        ];

        $donationsThisMonth = Donation::select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('SUM(amount) as total')
            )
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $donationChartLabels = $donationsThisMonth->pluck('date');
        $donationChartData   = $donationsThisMonth->pluck('total');

        return view("admin.dashboard", compact(
            "users",
            "donations",
            "messagesCount",
            "totalAmount",
            "campaignsStats",
            "donationChartLabels",
            "donationChartData"
        ));
    }
}
