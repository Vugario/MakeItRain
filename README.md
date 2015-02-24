MakeItRain
=====
MakeItRain unifies a variety of Payment Gateways for use in a platform. It provides a generic interface to easily connect new gateways.

---

## API Documentation
Every request has been written.


### Find all gateways
Finds every gateway (enabled, disabled and test).

GET ```/gateways```

	{
	  "mollie": {
	    "id": "mollie",
	    "title": "Mollie",
	    "services": [
	      "ideal",
	      "mastercard",
	      "visa",
	      "americanexpress",
	      "maestro",
	      "mistercash"
	    ]
	  }
	}


### Find all enabled gateways
Finds every enabled gateway.

GET ```/gateways/enabled```

	{
	  "mollie": {
	    "id": "mollie",
	    "title": "Mollie",
	    "services": [
	      "ideal",
	      "mastercard",
	      "visa",
	      "americanexpress",
	      "maestro",
	      "mistercash"
	    ]
	  }
	}

### Basic gateway endpoint
GET ```/gateways/:id/:action```

#### Start a payment
Start a payment with given parameters

POST ```/gateways/:id/start```


#### Gateway configuration
Retrieve the configuration options for this gateway

GET ```/gateways/:id/config```

	{
		"options": {
			"api_key": {
			"required": true,
			"title": "Your API key",
			"description": "Enter the API key as provided by Mollie.nl"
			}
		},

		"services": [
			"ideal",
			"mastercard",
			"visa",
			"americanexpress",
			"maestro",
			"mistercash"
		]
	}
