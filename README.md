silverstripe-socialextensions
=============================

Extensions for adding Social Sharing data to controllers.

## Requirements
SilverStripe 3.1 or higher

## Usage

Any DataObject or Page that wishes to use this extension must implement ```FBInterface```. Add ```OpenGraphExtensions``` as an extension.

```
class Page extends SiteTree implements FBInterface {
  ...
  public function getFBTitle() {
    return $this->Title;
  }
	
  public function getFBDescription() {
    return isset($this->Content) ? $this->Content : false;
	}
	
  public function getFBImage() {
    return false;
  }
  ...
}
```
