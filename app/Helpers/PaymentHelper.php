<?php


namespace App\Helpers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PaymentHelper
{
    private $authUrl;
    private $billerUrl;
    private $email;
    private $password;

    public function __construct()
    {
        $this->authUrl = "https://155.12.30.109:44020/api/token";
        $this->billerUrl = "https://155.12.30.109:44020/api/biller";
        $this->email = env('LIPAPAY_USERNAME'); // Set this in .env
        $this->password = env('LIPAPAY_PASSWORD'); // Set this in .env
    }

    /**
     * Get Authentication Token from API
     */
    private function getAuthToken()
    {
        try {
            $response = Http::withoutVerifying()->post($this->authUrl, [
                'email' => $this->email,
                'password' => $this->password
            ]);

            if ($response->successful()) {
                $data = $response->json();
                return $data['token'] ?? null;
            }

            Log::error("Auth Failed: " . $response->body());
            return null;
        } catch (\Exception $e) {
            Log::error("Auth Error: " . $e->getMessage());
            return null;
        }
    }


    /**
     * Initiate Payment and Return Control Number
     */
    public function initiatePayment(array $paymentData)
    {
        try {
            // Get Auth Token
            $token = $this->getAuthToken();
            if (!$token) {
                return null;
            }

            // Make the payment request
            $response = Http::withHeaders([
                'Authorization' => "Bearer $token",
                'Content-Type' => 'application/json'
            ])
                ->withoutVerifying() // Bypass SSL verification (temporary fix)
                ->post($this->billerUrl, $paymentData);

            if ($response->successful()) {
                $data = $response->json();

                if (isset($data['status']) && $data['status'] === true) {
                    return $data['controlNumber']; // Return control number
                }
            }


            Log::error("Payment Failed: " . $response->body());
            return null;
        } catch (\Exception $e) {
            Log::error("Payment Error: " . $e->getMessage());
            return null;
        }
    }
}
