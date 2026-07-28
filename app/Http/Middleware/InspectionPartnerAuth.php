<?php

namespace App\Http\Middleware;

use App\Models\InspectionPartnerKey;
use App\Models\InspectionSubmission;
use Closure;
use Illuminate\Http\Request;

class InspectionPartnerAuth
{
    public function handle(Request $request, Closure $next)
    {
        $raw = $this->extractKey($request);

        if (!$raw) {
            InspectionSubmission::log([
                'raw_order_ref' => $request->input('order_id'),
                'ip_address'    => $request->ip(),
                'status'        => 'invalid_auth',
                'error_message' => 'API key missing from request.',
            ]);

            return response()->json([
                'success' => false,
                'error'   => 'Unauthorized. API key required.',
            ], 401);
        }

        $keyRecord = InspectionPartnerKey::findByRaw($raw);

        if (!$keyRecord) {
            InspectionSubmission::log([
                'raw_order_ref' => $request->input('order_id'),
                'ip_address'    => $request->ip(),
                'status'        => 'invalid_auth',
                'error_message' => 'Provided API key is invalid or inactive.',
            ]);

            return response()->json([
                'success' => false,
                'error'   => 'Unauthorized. Invalid or inactive API key.',
            ], 401);
        }

        $keyRecord->markUsed();

        // Attach key record to request so the controller can reference it if needed
        $request->attributes->set('inspection_partner_key', $keyRecord);

        return $next($request);
    }

    private function extractKey(Request $request): ?string
    {
        // Accept the key from either the Authorization header (Bearer <key>)
        // or a dedicated X-API-Key header, for flexibility with partner systems.
        $bearer = $request->bearerToken();
        if ($bearer) {
            return $bearer;
        }

        $header = $request->header('X-API-Key');
        if ($header) {
            return $header;
        }

        return null;
    }
}
