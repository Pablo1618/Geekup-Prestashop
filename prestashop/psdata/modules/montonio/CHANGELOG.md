# Changelog

All notable changes to the Montonio PrestaShop module will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/), and this project adheres to [Semantic Versioning](https://semver.org/).

## [Unreleased]

- 

## [2.0.9] - 2024-10-30

### Fixed
- Simplified & improved compatibility with Zelarg The Checkout module.

## [2.0.8] - 2024-10-18

### Fixed
- Improved compatibility with Zelarg The Checkout module by overriding Zelarg's javascript function to be more compatible with Montonio's embedded payment form.

## [2.0.7] - 2024-10-17

### Fixed
- montonio.php now no longer registers the 'actionMontonioBeforeCreateOrder' hook since it was never meant to be a consumer of this hook, rather a producer. This was causing confusion and notice messages when the module was installed.

## [2.0.6] - 2024-10-10

### Fixed
- Fixed an issue where orders initially created with Montonio but paid using a different method were incorrectly marked as abandoned by our webhook under certain conditions.

## [2.0.5] - 2024-10-06

### Fixed
- Does not throw an exception anymore when an alternative refund system (not Montonio's own system) is used to refund pre-2.0.0 Montonio orders.


## [2.0.4] - 2024-10-01

### Fixed
- When an issue happens in webhook.php, the process lock is now properly released.

## [2.0.3] - 2024-09-13

### Changed
- montonio-load-queue.js file now registers a MutationObserver which looks for Montonio input elements and adds a class to its parent when found. This is used to target the parent element with CSS and necessary for Knowband Supercheckout compatibility.

## [2.0.2] - 2024-09-06

### Changed
- MontonioPaymentIntentDraftsTableManager.php file removed and plugin install no longer creates the table.
- MontonioEmbeddedPaymentMethodTrait::getEmbeddedPaymentOption() now always creates a new PaymentIntent draft, instead of reusing an existing one.
- MontonioEmbeddedPaymentMethodTrait::createPaymentIntentDraft() now returns the API response without saving the entity to the database.
- montonio_embedded_payment.tpl template file modified to rework Knowband Supercheckout compatibility.

### Fixed
- Embedded Blik and Card Payments always create a new PaymentIntent draft, instead of reusing an existing one. This was causing edge case issues in the previous version. Each full page reload now creates a new PaymentIntent draft, which is then used for the embedded payment form.

## [2.0.1] - 2024-08-21

### Added
- New option in the Advanced Settings to configure where should error messages be displayed.
- montonio/views/templates/front/montonio_errors_layout.tpl template file to display error messages.

### Changed
- montonio/error controller now figures out where to display error messages and redirects to the correct page or lets the error message be displayed in the current page.

### Fixed
- Embedded Blik and Card Payments now display in the correct locale at checkout.
- Error messages are now properly cleared after being shown once.

## [2.0.0] - 2024-08-01

### Changed
- Complete rewrite of the module.
