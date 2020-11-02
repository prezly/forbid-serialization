# Prezly's ForbidSerialization

Prezly's ForbidSerialization is a micro-package with a handy trait 
to forbid serialization of specific class in PHP.

This is because standard PHP `serialize()` function can serialize anything,
even instances you'd never want to be serialized. So `ForbidSerialization`
is just a nice easy way to *opt-out* whenever you do not *intentionally* want
an object to be serialized (which should be the default in 99.99% of all cases).

See this awesome talk from Marco Pivetta on **Extremely Defensive PHP**. 
Specifically the part about serialization: https://youtu.be/Gl9td0zGLhw?t=2352

## Usage

Usage is as simple as adding `use ForbidSerialization` to any class. 
Only make sure you do not override `__sleep()` or `__serialize()` methods.

```php
use Prezly\ForbidSerialization\ForbidsSerialization;

class AmazonWebServicesIntegrationService {
    use ForbidsSerialization;
    
    // ...
}
```

## Changelog

- [Changelog](./CHANGELOG.md)

## Credits

Brought to you with :heart: by [Prezly](https://www.prezly.com/?utm_source=github&utm_campaign=slate).
