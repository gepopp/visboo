<?php

use BeyondCode\LaravelWebSockets\Dashboard\Http\Middleware\Authorize;

return [

    /*
     * This package comes with multi tenancy out of the box. Here you can
     * configure the different apps that can use the webSockets server.
     *
     * Optionally you can disable client events so clients cannot send
     * messages to each other via the webSockets.
     */
    'apps' => [
        [
            'id' => env('PUSHER_APP_ID'),
            'name' => env('APP_NAME'),
            'key' => env('PUSHER_APP_KEY'),
            'secret' => env('PUSHER_APP_SECRET'),
            'enable_client_messages' => false,
            'enable_statistics' => true,
        ],
    ],

    /*
     * This class is responsible for finding the apps. The default provider
     * will use the apps defined in this config file.
     *
     * You can create a custom provider by implementing the
     * `AppProvider` interface.
     */
    'app_provider' => BeyondCode\LaravelWebSockets\Apps\ConfigAppProvider::class,

    /*
     * This array contains the hosts of which you want to allow incoming requests.
     * Leave this empty if you want to accept requests from all hosts.
     */
    'allowed_origins' => [
        //
    ],

    /*
     * The maximum request size in kilobytes that is allowed for an incoming WebSocket request.
     */
    'max_request_size_in_kb' => 250,

    /*
     * This path will be used to register the necessary routes for the package.
     */
    'path' => 'laravel-websockets',

    /*
     * Dashboard Routes Middleware
     *
     * These middleware will be assigned to every dashboard route, giving you
     * the chance to add your own middleware to this list or change any of
     * the existing middleware. Or, you can simply stick with this list.
     */
    'middleware' => [
        'web',
        Authorize::class,
    ],

    'statistics' => [
        /*
         * This model will be used to store the statistics of the WebSocketsServer.
         * The only requirement is that the model should extend
         * `WebSocketsStatisticsEntry` provided by this package.
         */
        'model' => \BeyondCode\LaravelWebSockets\Statistics\Models\WebSocketsStatisticsEntry::class,

        /*
         * Here you can specify the interval in seconds at which statistics should be logged.
         */
        'interval_in_seconds' => 60,

        /*
         * When the clean-command is executed, all recorded statistics older than
         * the number of days specified here will be deleted.
         */
        'delete_statistics_older_than_days' => 60,

        /*
         * Use an DNS resolver to make the requests to the statistics logger
         * default is to resolve everything to 127.0.0.1.
         */
        'perform_dns_lookup' => false,
    ],

    /*
     * Define the optional SSL context for your WebSocket connections.
     * You can see all available options at: http://php.net/manual/en/context.ssl.php
     */
    'ssl' => [
        /*
         * Path to local certificate file on filesystem. It must be a PEM encoded file which
         * contains your certificate and private key. It can optionally contain the
         * certificate chain of issuers. The private key also may be contained
         * in a separate file specified by local_pk.
         */
        'local_cert' => '-----BEGIN CERTIFICATE-----
MIIGWTCCBUGgAwIBAgISA8Txzh5fL220PhZGbmy2qAM5MA0GCSqGSIb3DQEBCwUA
MEoxCzAJBgNVBAYTAlVTMRYwFAYDVQQKEw1MZXQncyBFbmNyeXB0MSMwIQYDVQQD
ExpMZXQncyBFbmNyeXB0IEF1dGhvcml0eSBYMzAeFw0xOTAzMzExODU5MDFaFw0x
OTA2MjkxODU5MDFaMBQxEjAQBgNVBAMTCXZpc2Jvby5hdDCCAiIwDQYJKoZIhvcN
AQEBBQADggIPADCCAgoCggIBAKvgU47MO+fjpn+7tAZb5cyfnPLaeEtOFjQ/IdVs
JGKhrKeKHkiRIWd10z7T59B/R8T531d6nmx9D5pQekOzi02i+F50QgsY2eBCG3Ai
3pV1oeQZuoCSxtb/p614Gk0v1iIpQrI47wQra+y27cL8SCeQJEJWMqIuo99D1vaU
xOHOyYSFBt7Xs1+oBrmlqZ0AvoRP7+huDdz/q9K6rFFsf3sXlWoKpNfQB7khzqg8
ZGWmkCsGt/HZ0FrjWUrXV3N8TLVX5Hhy9V4N0wKCDEyFw27aUBxTUog2bbs3M0Kb
hueeQLiGRxN2wum1c1AbG9u8qnY5W9XW9S2kHXH9veQva9uEHXi/1sIoAIzEYrqH
2rcQw7mIKWbxErPSFUirJ2VCF59h0xheYzCYsINzu0g45O5OXsHyKgzYp//l/H8a
yHSlW3nxe0gIZyEWU7brAVJe4WM/TOn2QsQFiHsMlrridutuGSJXBG76cvdUNMlb
zf4+gIbj9f+cBHcGAk2ghlxXl4GjpEyC7KOxPUCX2i2Qd9EeRUze5NmOD5x73cMN
K1Ig6/bT1VgD5f4famU4RBSSe5/iLUYQQfO9cI/jDyycO5Vt9vsGptzAd8UI1ZJJ
KV1nkn250A7oGC8OEHzFTKizMpzdCVijgzzrpkyV8KtUbm/EavI2SVCzktZzPFFb
yYkfAgMBAAGjggJtMIICaTAOBgNVHQ8BAf8EBAMCBaAwHQYDVR0lBBYwFAYIKwYB
BQUHAwEGCCsGAQUFBwMCMAwGA1UdEwEB/wQCMAAwHQYDVR0OBBYEFOi3wu+5OZc2
F4CCIwezyVuZhUXTMB8GA1UdIwQYMBaAFKhKamMEfd265tE5t6ZFZe/zqOyhMG8G
CCsGAQUFBwEBBGMwYTAuBggrBgEFBQcwAYYiaHR0cDovL29jc3AuaW50LXgzLmxl
dHNlbmNyeXB0Lm9yZzAvBggrBgEFBQcwAoYjaHR0cDovL2NlcnQuaW50LXgzLmxl
dHNlbmNyeXB0Lm9yZy8wIwYDVR0RBBwwGoIJdmlzYm9vLmF0gg13d3cudmlzYm9v
LmF0MEwGA1UdIARFMEMwCAYGZ4EMAQIBMDcGCysGAQQBgt8TAQEBMCgwJgYIKwYB
BQUHAgEWGmh0dHA6Ly9jcHMubGV0c2VuY3J5cHQub3JnMIIBBAYKKwYBBAHWeQIE
AgSB9QSB8gDwAHUA4mlLribo6UAJ6IYbtjuD1D7n/nSI+6SPKJMBnd3x2/4AAAFp
1VV1EAAABAMARjBEAiB1203BWrCNISwJ4U0dWSZykb2eN4GoHsuNe7YFL7jdwAIg
GtFppPGmwQZ24PxXFkRXkl62KCsBnonwZlKUGUD6LfcAdwBj8tvN6DvMLM8LcoQn
V2szpI1hd4+9daY4scdoVEvYjQAAAWnVVXUsAAAEAwBIMEYCIQC/1QVUH8MwD6QW
MsrPaAzm5+nOzvms8Wx/MZ3/uWkpTwIhANiq7PABGGQSW0XrM58Ndf1v7XUt9K0u
qFGCP0ECgwUkMA0GCSqGSIb3DQEBCwUAA4IBAQByir8dv0KB8Pb2Ozy6Baa4K4NS
2oh1qpzILrI5QAE7H+AIGWz9ira/XTIk584INoxeR+Y918Z5h0E+JbTM4n0cKJbM
z7Pz8v0uw9A82DmBLdSRd5IKaarKy9Bah1n7mKWe8BAyy/mjhSf/0M1P5B0pjV+u
mzVHLCSsWgJ8Wm+Nv122Vlf7BkJi5ELO4AVLkA3K6TnGw0dZAPYWBgURYMfIItag
ePBAtaN6IIkInodOL3kWtigHKBj/L24ZfQT8Lp8eJplkUimJoK4zhjvLryLIq1r2
M4s2ICPHTAndAcj3mjozxNH1EG8sUQZV9TbfOOatd/7URNFnzXHN5Nv+0Edf
-----END CERTIFICATE-----

-----BEGIN CERTIFICATE-----
MIIEkjCCA3qgAwIBAgIQCgFBQgAAAVOFc2oLheynCDANBgkqhkiG9w0BAQsFADA/
MSQwIgYDVQQKExtEaWdpdGFsIFNpZ25hdHVyZSBUcnVzdCBDby4xFzAVBgNVBAMT
DkRTVCBSb290IENBIFgzMB4XDTE2MDMxNzE2NDA0NloXDTIxMDMxNzE2NDA0Nlow
SjELMAkGA1UEBhMCVVMxFjAUBgNVBAoTDUxldCdzIEVuY3J5cHQxIzAhBgNVBAMT
GkxldCdzIEVuY3J5cHQgQXV0aG9yaXR5IFgzMIIBIjANBgkqhkiG9w0BAQEFAAOC
AQ8AMIIBCgKCAQEAnNMM8FrlLke3cl03g7NoYzDq1zUmGSXhvb418XCSL7e4S0EF
q6meNQhY7LEqxGiHC6PjdeTm86dicbp5gWAf15Gan/PQeGdxyGkOlZHP/uaZ6WA8
SMx+yk13EiSdRxta67nsHjcAHJyse6cF6s5K671B5TaYucv9bTyWaN8jKkKQDIZ0
Z8h/pZq4UmEUEz9l6YKHy9v6Dlb2honzhT+Xhq+w3Brvaw2VFn3EK6BlspkENnWA
a6xK8xuQSXgvopZPKiAlKQTGdMDQMc2PMTiVFrqoM7hD8bEfwzB/onkxEz0tNvjj
/PIzark5McWvxI0NHWQWM6r6hCm21AvA2H3DkwIDAQABo4IBfTCCAXkwEgYDVR0T
AQH/BAgwBgEB/wIBADAOBgNVHQ8BAf8EBAMCAYYwfwYIKwYBBQUHAQEEczBxMDIG
CCsGAQUFBzABhiZodHRwOi8vaXNyZy50cnVzdGlkLm9jc3AuaWRlbnRydXN0LmNv
bTA7BggrBgEFBQcwAoYvaHR0cDovL2FwcHMuaWRlbnRydXN0LmNvbS9yb290cy9k
c3Ryb290Y2F4My5wN2MwHwYDVR0jBBgwFoAUxKexpHsscfrb4UuQdf/EFWCFiRAw
VAYDVR0gBE0wSzAIBgZngQwBAgEwPwYLKwYBBAGC3xMBAQEwMDAuBggrBgEFBQcC
ARYiaHR0cDovL2Nwcy5yb290LXgxLmxldHNlbmNyeXB0Lm9yZzA8BgNVHR8ENTAz
MDGgL6AthitodHRwOi8vY3JsLmlkZW50cnVzdC5jb20vRFNUUk9PVENBWDNDUkwu
Y3JsMB0GA1UdDgQWBBSoSmpjBH3duubRObemRWXv86jsoTANBgkqhkiG9w0BAQsF
AAOCAQEA3TPXEfNjWDjdGBX7CVW+dla5cEilaUcne8IkCJLxWh9KEik3JHRRHGJo
uM2VcGfl96S8TihRzZvoroed6ti6WqEBmtzw3Wodatg+VyOeph4EYpr/1wXKtx8/
wApIvJSwtmVi4MFU5aMqrSDE6ea73Mj2tcMyo5jMd6jmeWUHK8so/joWUoHOUgwu
X4Po1QYz+3dszkDqMp4fklxBwXRsW10KXzPMTZ+sOPAveyxindmjkW8lGy+QsRlG
PfZ+G6Z6h7mjem0Y+iWlkYcV4PIWL1iwBi8saCbGS5jN2p8M+X+Q7UNKEkROb3N6
KOqkqm57TH2H3eDJAkSnh6/DNFu0Qg==
-----END CERTIFICATE-----
',

        /*
         * Path to local private key file on filesystem in case of separate files for
         * certificate (local_cert) and private key.
         */
        'local_pk' => '-----BEGIN RSA PRIVATE KEY-----
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
-----END RSA PRIVATE KEY-----
',

        /*
         * Passphrase for your local_cert file.
         */
        'passphrase' => null,
    ],

    /*
     * Channel Manager
     * This class handles how channel persistence is handled.
     * By default, persistence is stored in an array by the running webserver.
     * The only requirement is that the class should implement
     * `ChannelManager` interface provided by this package.
     */
    'channel_manager' => \BeyondCode\LaravelWebSockets\WebSockets\Channels\ChannelManagers\ArrayChannelManager::class,
];
