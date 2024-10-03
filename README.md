# jde shipping API integration SDK

Features:

- [x] Cost Calculation
  - [x] Delivery cost calculation by addresses
  - [x] Delivery cost calculation
  - [x] SMART delivery cost calculation (by city names)
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
- [x] Geography
  - [x] Searching for terminals by KLADR
  - [x] Searching for cities by types
  - [x] Searching by terminal type
  - [x] Branch working hours
- [ ] Documents
  - [ ] Receiving documents
  - [ ] Receiving a list of document codes

## Installation

```bash
composer require StasPlov/jde-shipping
```

# How to use

```php
$jdeShipping = new JdeShipping();

$jdeShipping->setUser('1234');
$jdeShipping->setToken('1234');

$geo = new GeoSearchRequest();
$geo ->setMode(1);

$response = $jdeShipping->getGeoSearchRequest($geo);
```

## Cost Calculation

### Delivery cost calculation by addresses
```php
$shipmentCalc = (new ShipmentCostCalcByAddressRequest())
	->setAddrFrom('владивосток')
	->setAddrTo('москва')
	->setType(1)
	->setWeight(2.167)
	->setWidth(0.121)
	->setHeight(0.121)
	->setLength(2.135)
	->setQuantity(1)
	->setPickup(1)
	->setDelivery(1)
	->setDeclared(3670)
	->setOversizeWeight(1)
	->setOversizeVolume(1)
	->setObrVolume(0.031);

$response = $this->jdeShipping->getShipmentCostCalcByAddressRequest($shipmentCalc);

$cost = $response->getPrice();
```
