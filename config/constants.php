<?php

return [
    'PAGE_SIZE' => 10,
    'AVATAR_PROFILE_FOLDER' => 'images/avatars',
    'AIRLINE_LOGO_FOLDER' => 'images/airline_logo',
    'PROMOTION_IMG_FOLDER' => 'images/promotion_img',
    'NEWS_IMG_FOLDER' => 'images/news_img',
    'CLIENT_PAGE' => 'https://viettel-booking.com',
    'MAX_OF_TOP_FLIGHT_RESULTS' => 10,
    'MAX_RELATED_NEWS' => 5,
    'HOME_TOTAL_LATEST_NEWS' => 3,
    'BOOKING_NO_LENGTH' => 6,
    'OTP_LENGTH' => 6,
    'BOOKING_EXPIRED_TIME' => env('BOOKING_EXPIRED_TIME', 90),
    'CHEAP_FLIGHT_EXPIRED_TIME' => env('CHEAP_FLIGHT_EXPIRED_TIME', 15),
    'NAPAS' => [
        'URL' => env('NAPAS_URL', 'https://dps-staging.napas.com.vn'),
        'MERCHANT' => env('NAPAS_MERCHANT', 'VIETTEL_TELECOM'),
        'CLIENT_ID' => env('NAPAS_CLIENT_ID', 'VIETTEL_TELECOM'),
        'CLIENT_SECRET' => env('NAPAS_CLIENT_SECRET', '400FE3F6E612362D5CB88A46EC0E2903'),
        'USER_NAME' => env('NAPAS_USER_NAME', 'VIETTEL_TELECOM'),
        'PASSWORD' => env('NAPAS_PASSWORD', 'YhBlzulosQbYiveC'),
        'BOOKING_PREFIX' => 'VTBOOKING',
    ],
    'SMS' => [
        'SOAP' =>[
            'URL' => env('SMS_SOAP_URL', 'http://impl.bulksms.ws/'),
            'ACTION' => env('SMS_SOAP_ACTION', 'wsCpMt'),
            'USER' => env('SMS_SOAP_USER', 'dvbooking'),
            'PASSWORD' => env('SMS_SOAP_PASSWORD', '147a@258'),
            'CPCODE' => env('SMS_SOAP_CPCODE', 'BOOKINGONLINE'),
            'SERVICE_ID' => env('SMS_SOAP_SERVICE_ID', 'VTBooking'),
            'COMMAND_CODE' => env('SMS_COMMAND_CODE', 'bulksms'),
        ]
    ]
];