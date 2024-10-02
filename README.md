# jde shipping API integration SDK

Features:

- [ ] Cost Calculation
  - [ ] Delivery cost calculation by addresses
  - [ ] Delivery cost calculation
  - [ ] SMART delivery cost calculation (by city names)
- [ ] Requests
  - [ ] New delivery request
  - [ ] List of requests
- [ ] Shipments
  - [ ] Receiving new shipment statuses
  - [ ] Shipment delivery status by waybill number
  - [ ] Simplified shipment delivery status by waybill number
  - [ ] Setting a delivery restriction on a shipment
- [ ] Services
  - [ ] Receiving a list of service codes
  - [ ] Receiving information on shipment services
  - [ ] Receiving a package of documents
  - [ ] Receiving payment data for services
- [ ] Geography
  - [ ] Searching for terminals by KLADR
  - [ ] Searching for cities by types
  - [x] Searching by terminal type
  - [ ] Branch working hours
- [ ] Documents
  - [ ] Receiving documents
  - [ ] Receiving a list of document codes

## Installation

```bash
composer require StasPlov/jde-shipping
```

## How to use


```php
$jdeShipping = new JdeShipping();

$jdeShipping->setUser('1234');
$jdeShipping->setToken('1234');

$geo = new GeoSearchRequest();
$geo ->setMode(1);

$response = $jdeShipping->getGeoSearchRequest($geo);
```
