<?php
/**
 * RADIUS extension stubs
 *
 * @generate-function-entries
 */

/* ----------------------------------------------------------------- *
 *  Connection / housekeeping                                        *
 * ----------------------------------------------------------------- */

/**
 * Open a RADIUS authentication socket.
 *
 * @return resource|false  A RADIUS handle on success, or false on failure.
 */
function radius_auth_open() {}

/**
 * Open a RADIUS accounting socket.
 *
 * @return resource|false
 */
function radius_acct_open() {}

/**
 * Close a RADIUS handle.
 *
 * @param  resource $radius_handle
 * @return bool  True on success, false on failure.
 */
function radius_close($radius_handle): bool {}

/**
 * Get the last RADIUS error message.
 *
 * @param  resource $radius_handle
 * @return string
 */
function radius_strerror($radius_handle): string {}

/**
 * Read a `radius.conf` (FreeRADIUS-style) configuration file.
 *
 * @param  resource $radius_handle
 * @param  string   $filename
 * @return bool
 */
function radius_config($radius_handle, string $filename): bool {}

/**
 * Add a RADIUS server definition to the handle.
 *
 * @param resource $radius_handle
 * @param string   $hostname
 * @param int      $port
 * @param string   $secret
 * @param int      $timeout
 * @param int      $maxtries
 * @return bool
 */
function radius_add_server(
    $radius_handle,
    string $hostname,
    int $port,
    string $secret,
    int $timeout,
    int $maxtries
): bool {}

/**
 * Begin a new RADIUS request of the given code (e.g. `RADIUS_ACCESS_REQUEST`).
 *
 * @param  resource $radius_handle
 * @param  int      $code
 * @return bool
 */
function radius_create_request($radius_handle, int $code): bool {}

/* ----------------------------------------------------------------- *
 *  Attribute setters                                                *
 * ----------------------------------------------------------------- */

/** @param resource $radius_handle */
function radius_put_string(
    $radius_handle,
    int $type,
    string $value,
    int $options = 0,
    int $tag     = 0
): bool {}

/**
 * Add an integer attribute to the request.
 *
 * @param resource $radius_handle
 * @param int      $type
 * @param int      $value
 * @param int      $options  Bit-mask of RADIUS_OPTION_* constants
 * @param int      $tag
 *
 * @return bool
 */
function radius_put_int(
    $radius_handle,
    int $type,
    int $value,
    int $options = 0,
    int $tag = 0
): bool {}

/**
 * Add a raw binary attribute.
 *
 * @param resource $radius_handle
 * @param int      $type
 * @param string   $data
 * @param int      $options
 * @param int      $tag
 *
 * @return bool
 */
function radius_put_attr(
    $radius_handle,
    int $type,
    string $data,
    int $options = 0,
    int $tag = 0
): bool {}

/**
 * Add an IP-address attribute (dotted-quad).
 *
 * @param resource $radius_handle
 * @param int      $type
 * @param string   $addr
 * @param int      $options
 * @param int      $tag
 *
 * @return bool
 */
function radius_put_addr(
    $radius_handle,
    int $type,
    string $addr,
    int $options = 0,
    int $tag = 0
): bool {}

/**
 * Add a vendor-specific *string* attribute.
 *
 * @param resource $radius_handle
 * @param int      $vendor
 * @param int      $type
 * @param string   $value
 * @param int      $options
 * @param int      $tag
 *
 * @return bool
 */
function radius_put_vendor_string(
    $radius_handle,
    int $vendor,
    int $type,
    string $value,
    int $options = 0,
    int $tag = 0
): bool {}

/**
 * Add a vendor-specific *integer* attribute.
 *
 * @param resource $radius_handle
 * @param int      $vendor
 * @param int      $type
 * @param int      $value
 * @param int      $options
 * @param int      $tag
 *
 * @return bool
 */
function radius_put_vendor_int(
    $radius_handle,
    int $vendor,
    int $type,
    int $value,
    int $options = 0,
    int $tag = 0
): bool {}

/**
 * Add an arbitrary vendor-specific binary attribute.
 *
 * @param resource $radius_handle
 * @param int      $vendor
 * @param int      $type
 * @param string   $data
 * @param int      $options
 * @param int      $tag
 *
 * @return bool
 */
function radius_put_vendor_attr(
    $radius_handle,
    int $vendor,
    int $type,
    string $data,
    int $options = 0,
    int $tag = 0
): bool {}

/**
 * Add a vendor-specific IP-address attribute.
 *
 * @param resource $radius_handle
 * @param int      $vendor
 * @param int      $type
 * @param string   $addr
 * @param int      $options
 * @param int      $tag
 *
 * @return bool
 */
function radius_put_vendor_addr(
    $radius_handle,
    int $vendor,
    int $type,
    string $addr,
    int $options = 0,
    int $tag = 0
): bool {}

/* ----------------------------------------------------------------- *
 *  Request / reply                                                  *
 * ----------------------------------------------------------------- */

/**
 * Send the current request and wait for the reply.
 *
 * @param  resource $radius_handle
 * @return int|false  Reply code (e.g. `RADIUS_ACCESS_ACCEPT`) or false on error.
 */
function radius_send_request($radius_handle) {}

/**
 * Fetch the next attribute from the reply.
 *
 * **Return values**
 * * `array{attr:int,data:string}`  – a real attribute  
 * * `0`                            – end of attributes  
 * * `false`                        – on error
 *
 * @param  resource $radius_handle
 * @return array|int|false
 */
function radius_get_attr($radius_handle) {}

/* ----------------------------------------------------------------- *
 *  Tagged attributes                                                *
 * ----------------------------------------------------------------- */

/**
 * Strip the one-byte tag and return the data part.
 *
 * @param  string $attr
 * @return string|false
 */
function radius_get_tagged_attr_data(string $attr) {}

/**
 * Return the tag value of a tagged attribute.
 *
 * @param  string $attr
 * @return int|false
 */
function radius_get_tagged_attr_tag(string $attr) {}

/* ----------------------------------------------------------------- *
 *  Vendor-specific parser                                           *
 * ----------------------------------------------------------------- */

/**
 * Break down a vendor-specific attribute returned by {@see radius_get_attr()}.
 *
 * @param  string $data
 * @return array|false  `['vendor' => int, 'attr' => int, 'data' => string]`
 */
function radius_get_vendor_attr(string $data) {}

/* ----------------------------------------------------------------- *
 *  Converters                                                       *
 * ----------------------------------------------------------------- */

/**
 * Convert a four-byte RADIUS address to dotted-quad form.
 *
 * @param  string $data
 * @return string
 */
function radius_cvt_addr(string $data): string {}

/**
 * Convert a four-byte RADIUS integer to PHP `int`.
 *
 * @param  string $data
 * @return int
 */
function radius_cvt_int(string $data): int {}

/**
 * Convert a RADIUS length-prefixed string.
 *
 * @param  string $data
 * @return string|false
 */
function radius_cvt_string(string $data) {}

/* ----------------------------------------------------------------- *
 *  Crypto helpers                                                   *
 * ----------------------------------------------------------------- */

/**
 * Salt-encrypt a RADIUS attribute value (RFC 2865 § 5.3).
 *
 * @param resource $radius_handle
 * @param string   $data
 * @return string|false
 */
function radius_salt_encrypt_attr($radius_handle, string $data) {}

/**
 * Get the 16-octet request authenticator.
 *
 * @param  resource $radius_handle
 * @return string|false
 */
function radius_request_authenticator($radius_handle) {}

/**
 * Return the shared secret configured for the current server.
 *
 * @param  resource $radius_handle
 * @return string|false
 */
function radius_server_secret($radius_handle) {}

/**
 * De-obfuscate a RADIUS attribute.
 *
 * @param resource $radius_handle
 * @param string   $mangled
 * @return string|false
 */
function radius_demangle($radius_handle, string $mangled) {}

/**
 * De-obfuscate an MS-MPPE-Send/Recv-Key.
 *
 * @param resource $radius_handle
 * @param string   $mangled
 * @return string|false
 */
function radius_demangle_mppe_key($radius_handle, string $mangled) {}