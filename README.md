# Serial Number Generator in PHP

**Semiorbit Serial Number Generator** is a PHP library to create a Serial Number of **alphanumeric 16 random chars**. It is mostly unique, depending on microtime() and mt_rand() functions converted to BASE 36. (So, it should be 100% unique for one server host as long as server time is accurate and not backward).

## Install

```composer
composer require semiorbit/serial
```

## Documentation

### SerialNumber::Generate

Generates an alphanumeric 16 chars Serial Number. Chars could be grouped in 4 seperated segments.

```php
SerialNumber::Generate(string $separator = '') : string
```
#### Params
* string **$separator** dash by default
* returns string
  
```php
use SemiorbitSerial\Serial;

echo SerialNumber::Generate();

echo SerialNumber::Generate('-');

// OUTPUT:

// CVPKRIJ48NZS4JRO
// CVPK-RIJ4-8NZS-4JRO
```



### SerialNumber::Format

Returns a formatted Serial Number string width dashes (or selected separator)

```php 
Guid::Format(string $guid, bool $enclose = true, string $separator = '-'): string
```

#### Params

* string **$serial** A Serial Number string to parse
* string **$separator** Dash by default
* returns string **{xxxx-xxxx-xxxx-xxxx}**
  
```php
use SemiorbitSerial\Serial;

$serial = '4F93820EFEF290A26489E0AE803A37C0';

echo SerialNumber::Format($serial);

// OUTPUT:
// {4F93820E-FEF2-90A2-6489-E0AE803A37C0}
```

## License

The Semiorbit Serial Number is an open-source PHP library licensed under the [MIT license](http://opensource.org/licenses/MIT).