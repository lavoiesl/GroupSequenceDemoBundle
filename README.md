Demo for https://github.com/symfony/symfony/issues/9939

## Installation

 1. Extract to `src/Acme/GroupSequenceDemoBundle`
 2. Add `new Acme\GroupSequenceDemoBundle\AcmeGroupSequenceDemoBundle(),` to `app/AppKernel.php`
 3. Add the routing to `app/config/routing.yml`:

```yaml
acme_demo:
    resource: "@AcmeGroupSequenceDemoBundle/Controller/"
    type:     annotation
```