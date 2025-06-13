<?php
namespace App\Http\Controllers\Admin;

use App\Models\Donation;
use App\Models\DonationCampaign;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DonationCampaignController
{
    public function index()
    {
        $transactions      = Transaction::latest()->paginate(10);
        $donationCampaigns = DonationCampaign::latest()->paginate(5);
        return view("admin.donations.index", compact("donationCampaigns", "transactions"));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'               => 'required|string|max:255',
            'description'         => 'nullable|string',
            'image'               => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'target_amount'       => 'required|numeric|min:1',
            'single_amount'       => 'nullable|numeric|min:1',
            'allow_full_donation' => 'required|boolean',
            'status'              => 'required|in:active,inactive',
            'start_date'          => 'nullable|date',
            'end_date'            => 'nullable|date|after_or_equal:start_date',
        ]);

        if ($request->filled('start_date')) {
            $validated['start_date'] = Carbon::parse($request->start_date)->format('Y-m-d H:i:s');
        }

        if ($request->filled('end_date')) {
            $validated['end_date'] = Carbon::parse($request->end_date)->format('Y-m-d H:i:s');
        }

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('campaigns', 'public');
        }

        DonationCampaign::create($validated);

        return redirect()->route('admin.donation-campaigns.index')->with('success', 'Campaign created successfully.');
    }

    public function update(Request $request, DonationCampaign $donationCampaign)
    {
        $validated = $request->validate([
            'title'               => 'required|string|max:255',
            'description'         => 'nullable|string',
            'image'               => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'target_amount'       => 'required|numeric|min:1',
            'single_amount'       => 'nullable|numeric|min:1',
            'allow_full_donation' => 'required|boolean',
            'status'              => 'required|in:active,inactive',
            'start_date'          => 'nullable|date',
            'end_date'            => 'nullable|date|after_or_equal:start_date',
        ]);

        if ($request->filled('start_date')) {
            $validated['start_date'] = Carbon::parse($request->start_date)->format('Y-m-d H:i:s');
        }

        if ($request->filled('end_date')) {
            $validated['end_date'] = Carbon::parse($request->end_date)->format('Y-m-d H:i:s');
        }

        if ($request->hasFile('image')) {
            if ($donationCampaign->image) {
                Storage::disk('public')->delete($donationCampaign->image);
            }
            $validated['image'] = $request->file('image')->store('campaigns', 'public');
        }

        $donationCampaign->update($validated);

        return redirect()->route('admin.donation-campaigns.index')->with('success', 'Campaign updated successfully.');
    }

    public function destroy(DonationCampaign $donationCampaign)
    {
        if ($donationCampaign->image) {
            Storage::disk('public')->delete($donationCampaign->image);
        }

        $donationCampaign->delete();

        return redirect()->route('admin.donation-campaigns.index')->with('success', 'Campaign deleted successfully.');
    }

    public function toggleActive(DonationCampaign $donationCampaign)
    {
        $newStatus = $donationCampaign->status === 'active' ? 'inactive' : 'active';
        $donationCampaign->update(['status' => $newStatus]);

        return back()->with('success', 'The Donation Campaign status has been updated successfully.');
    }

    public function msgs()
    {
        $msgs = Donation::whereNotNull('message')->paginate(20);
        return view('admin.donations.msg', compact('msgs'));
    }
}
