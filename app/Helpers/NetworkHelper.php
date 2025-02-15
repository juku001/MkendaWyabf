<?php

namespace App\Helpers;

class NetworkHelper
{


    public static function getNetworkByPrefix($mobileNumber)
    {
        // Normalize the mobile number
        $normalizedNumber = self::normalizeMobileNumber($mobileNumber);

        // Define the prefixes and their corresponding networks
        $prefixes = [
            env('PAY_METHOD_HALOTEL') => ['61', '62'],
            env('PAY_METHOD_TIGO') => ['65', '67', '71', '77'],
            env('PAY_METHOD_AIRTEL') => ['68', '69', '78'],
            env('PAY_METHOD_VODA') => ['74', '75', '76']
        ];

        // Check the prefix and return the corresponding network
        foreach ($prefixes as $network => $networkPrefixes) {
            foreach ($networkPrefixes as $prefix) {
                if (strpos($normalizedNumber, $prefix) === 0) {
                    return $network;
                }
            }
        }

        // Return null if no network is found
        return null;
    }

    public static function normalizeMobileNumber($mobileNumber)
    {
        // Remove any non-digit characters
        $mobileNumber = preg_replace('/\D/', '', $mobileNumber);

        // Normalize the number to start with the country code 255
        if (strpos($mobileNumber, '255') === 0) {
            return substr($mobileNumber, 3); // Remove the country code
        } elseif (strpos($mobileNumber, '0') === 0) {
            return substr($mobileNumber, 1); // Remove the leading 0
        } elseif (strpos($mobileNumber, '+255') === 0) {
            return substr($mobileNumber, 4); // Remove the +255 country code
        }

        return $mobileNumber;
    }


}