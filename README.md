# Shopper's Mind Tracking Code for Magento 2
*Shopper's mind certified shop satisfaction survey.*

## 1. INSTALLATION
1. It is recommended to ENABLE the cache at System > Cache Management before installing any extension.
2. Unpack the zip file provided andpload the extracted folders and files into the root directory of your Magento installation. The root directory of Magento is the folder that contains the directories "app", "bin", "lib" and more. All folders should match the existing folder structure.
3. Connect via SSH and run the following commands:
4. ```php bin/magento module:enable SMind_TrackingCode```
5. ```php bin/magento setup:upgrade```
6. Go to System > Cache Management and click both the 'Flush Magento Cache' as well as the 'Flush Cache Storage' button. This is required to activate the extension.

## 2. SET UP IN MAGENTO
Once you have installed the extension, you only need to insert the unique tracking code (key) provided by Shopper's Mind. Go to Stores > Configuration > Shopper's Mind > Conversion and insert the key in specified field. Check that extensions is also enabled.

## 3. USAGE
When properly configured, tracking code will be automatically appended to success page JavaScript and survey popup will show on Order process completion.

## 4. TROUBLESHOOTING
### Reporting Any Issues/Bugs
If you experience any issues/bugs with this extension, please let us know via info@ceneje.si
