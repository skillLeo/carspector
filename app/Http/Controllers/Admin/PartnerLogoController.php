<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PartnerLogo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PartnerLogoController extends Controller
{
    public function index()
    {
        $logos = PartnerLogo::orderBy('name')->get();

        return view('admin.partner_logos.index', compact('logos'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:190'],
            'logo' => ['required', 'image', 'max:2048'],
        ]);

        $filename = time() . '_' . Str::slug($data['name']) . '.' . $request->file('logo')->getClientOriginalExtension();
        $destination = public_path('partner-logos');
        if (!File::exists($destination)) {
            File::makeDirectory($destination, 0755, true);
        }
        $request->file('logo')->move($destination, $filename);

        PartnerLogo::create([
            'name' => $data['name'],
            'logo_path' => 'partner-logos/' . $filename,
        ]);

        return redirect()->route('admin.partner-logos.index')->with('success', 'Partner logo added successfully.');
    }

    public function destroy(PartnerLogo $partnerLogo)
    {
        if ($partnerLogo->orders()->exists()) {
            return redirect()
                ->route('admin.partner-logos.index')
                ->withErrors(['logo' => 'This logo is attached to existing orders and cannot be deleted.']);
        }

        if ($partnerLogo->logo_path && File::exists(public_path($partnerLogo->logo_path))) {
            File::delete(public_path($partnerLogo->logo_path));
        }

        $partnerLogo->delete();

        return redirect()->route('admin.partner-logos.index')->with('success', 'Partner logo deleted successfully.');
    }
}
