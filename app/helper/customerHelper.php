<?php
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;


if (!function_exists('decodeHMACToken')) {
    /**
     * Decode HMAC token and retrieve original data.
     *
     * @param string $encodedToken [token]
     * @param string $hmacSecretKey [purchase_code]
     * @return array|bool [decoded information or FALSE on failure]
     */
    function decodeHMACToken(string $encodedToken, string $hmacSecretKey)
    {
        try {
            // Validate the token format
            if (strpos($encodedToken, '.') === false) {
                throw new \Exception('Invalid token format.');
            }

            // Split payload and signature
            [$payload, $providedSignature] = explode('.', $encodedToken);

            // Validate base64 encoding of payload
            if (base64_decode($payload, true) === false) {
                throw new \Exception('Invalid base64 payload encoding.');
            }

            // Recalculate the signature
            $calculatedSignature = hash_hmac('sha512', $payload, $hmacSecretKey);

            // Verify signatures match
            if (!hash_equals($providedSignature, $calculatedSignature)) {
                throw new \Exception('Signature verification failed.');
            }

            // Decode payload to retrieve original data
            $decodedPayload = json_decode(base64_decode($payload), true);

            if (!is_array($decodedPayload)) {
                throw new \Exception('Invalid payload data.');
            }

            return $decodedPayload;
        } catch (\Exception $e) {
            Log::error('DecodeHMACToken error: ' . $e->getMessage());
            return false;
        }
    }
}

if (!function_exists('encodeHMACToken')) {
    /**
     * Generate HMAC token from purchase code and buyer's information.
     *
     * @param array $data [payload data]
     * @param string $hmacSecretKey [purchase_code]
     * @return string|bool [token or FALSE on failure]
     */    
    function encodeHMACToken(array $data, string $hmacSecretKey)
    {
        try {
            // Required fields
            $requiredFields = [
                'purchase_code', 'item_id', 'buyer', 'purchase_count',
                'activated_domain', 'ip', 'purchase_time'
            ];

            foreach ($requiredFields as $field) {
                if (!array_key_exists($field, $data)) {
                    throw new \Exception("Missing required field: $field");
                }
            }

            // Create payload with 1-week interval
            $payload = [
                "purchase_code" => $data['purchase_code'],
                "item_id" => $data['item_id'],
                "buyer" => $data['buyer'],
                "purchase_count" => $data['purchase_count'],
                "activated_domain" => $data['activated_domain'],
                "ip" => $data['ip'],
                "purchase_time" => $data['purchase_time'],
                "check_interval" => 604800, // 1 week in seconds
            ];

            // Encode payload and calculate signature
            $payloadJson = base64_encode(json_encode($payload));
            $signature = hash_hmac('sha512', $payloadJson, $hmacSecretKey);

            if ($payloadJson === false || $signature === false) {
                throw new \Exception('Failed to generate token.');
            }

            // Concatenate payload and signature
            return $payloadJson . '.' . $signature;
        } catch (\Exception $e) {
            Log::error('EncodeHMACToken error: ' . $e->getMessage());
            return false;
        }
    }
}

if (!function_exists('jsonResponse')) {
    /**
     * Return a standardized JSON response.
     *
     * @param bool $success
     * @param string $message
     * @param mixed|null $data
     * @param array $errors
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    function jsonResponse($success = true, $message = '', $data = null, $errors = [], $code = 200)
    {
        return response()->json([
            'success' => $success,
            'message' => $message,
            'data' => $data,
            'errors' => $errors,
        ], $code);
    }
}




if (!function_exists('valueExistsInTable')) {
    /**
     * Check if a value exists in a specific table and column.
     *
     * @param string $table
     * @param string $column
     * @param mixed $value
     * @return bool
     */
    function valueExistsInTable(string $table, string $column, $value): bool
    {
        // Use Laravel's Query Builder to check for the value
        return DB::table($table)->where($column, $value)->exists();
    }
}
