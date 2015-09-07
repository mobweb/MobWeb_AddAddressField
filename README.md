# MobWeb_AddAddressField extension for Magento

A simple extension that adds a new address field that can be entered by the customer when manually creating an address or during checkout.

## Installation

Install using [colinmollenhour/modman](https://github.com/colinmollenhour/modman/).

Replace all occurrences of the label "Custom Address Field" and the attribute code "custom_address_field" with your desired values.

Modify your templates so that the fields can be entered in the front- and backend. In Magento CE 1.9 the templates that I had to modify were:

- Add/edit address in the customer account: *app/design/THEME/PACKAGE/template/customer/address/edit.phtml*
- Checkout billing address: *app/design/THEME/PACKAGE/template/persistent/checkout/onepage/billing.phtml*
- Checkout shipping address: *app/design/THEME/PACKAGE/template/checkout/onepage/shipping.phtml*

Simply copy and edit an existing field to add your new field, for example like this:

```
<li class="wide">
    <label for="billing:custom_address_field"><?php echo $this->__('Custom Address Field') ?></label>
    <div class="input-box">
        <input type="text" title="<?php echo $this->__('Custom Address Field') ?>" name="billing[custom_address_field]" id="billing:custom_address_field" value="<?php echo $this->escapeHtml($this->getAddress()->getData('custom_address_field')) ?>" class="input-text" />
    </div>
</li>
```

## Questions? Need help?

Most of my repositories posted here are projects created for customization requests for clients, so they probably aren't very well documented and the code isn't always 100% flexible. If you have a question or are confused about how something is supposed to work, feel free to get in touch and I'll try and help: [info@mobweb.ch](mailto:info@mobweb.ch).