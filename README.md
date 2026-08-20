# PocketMine-MP
[![GitHub last commit](https://img.shields.io/github/last-commit/JiJingren/PocketMine-MP)](https://github.com/JiJingren/PocketMine-MP)
[![GitHub stars](https://img.shields.io/github/stars/JiJingren/PocketMine-MP)](https://github.com/JiJingren/PocketMine-MP)

## iOS Modifications

This fork is adapted and patched by **JiJingren** for iOS devices
(PHP 7.4.33, NTS build without the pthreads extension).

### What was changed

- Added a compatibility layer for pthreads, so the server can run on non-ZTS PHP builds without the pthreads extension
- Reworked `CommandReader`, `MainLogger`, `ServerKiller`, `RCON`, `SessionManager`, `RakLibServer` and `AsyncPool` for single-process operation
- Fixed PHP 7.4 syntax issues (curly-brace string offsets)
- Added `Phar` class guards for PHP builds without the phar extension
- Fixed `Level` chunk unload queue initialization warning
- Fixed `start.sh` PHP detection bug and symlink invocation (`/usr/bin/mcserver`)

### Usage

- Start the server: `mcserver`, or `cd /var/root/PocketMine-MP && ./start.sh`
- Send console commands via FIFO: `echo "list" > /tmp/pm-console`



	This program is free software: you can redistribute it and/or modify
	it under the terms of the GNU Lesser General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU Lesser General Public License for more details.

	You should have received a copy of the GNU Lesser General Public License
	along with this program.  If not, see <http://www.gnu.org/licenses/>.


__PocketMine-MP is a free, open-source software that creates Minecraft: Pocket Edition servers and allows extending its functionalities__

### [Homepage](http://www.pocketmine.net/)

### [Forums](http://forums.pocketmine.net/)

### [Documentation](http://pocketmine-mp.readthedocs.org/)

### [Plugin Repository](http://plugins.pocketmine.net/)

<!--## [FAQ: Frequently Asked Questions](https://github.com/PocketMine/PocketMine-MP/wiki/Frequently-Asked-Questions)-->

### [Official Jenkins server](http://jenkins.pocketmine.net/)

### API Documentation
 * [Official Doxygen-generated documentation](http://docs.pocketmine.net/)
 * [Latest Doxygen generated from development](http://jenkins.pocketmine.net/job/PocketMine-MP-doc/doxygen/)

### [Twitter @PocketMine](https://twitter.com/PocketMine)

### IRC Chat #pocketmine (or #mcpedevs) @ irc.freenode.net
[#pocketmine + #mcpedevs channel WebIRC](http://webchat.freenode.net/?channels=pocketmine,mcpedevs)

### Want to contribute?
* Check the [Contributing Guidelines](CONTRIBUTING.md)


## Third-party Libraries/Protocols Used
* __[PHP Sockets](http://php.net/manual/en/book.sockets.php)__
* __[PHP mbstring](http://php.net/manual/en/book.mbstring.php)__
* __[PHP SQLite3](http://php.net/manual/en/book.sqlite3.php)__
* __[PHP BCMath](http://php.net/manual/en/book.bc.php)__
* __[PHP pthreads](http://pthreads.org/)__ by _[krakjoe](https://github.com/krakjoe)_: Threading for PHP - Share Nothing, Do Everything.
* __[PHP YAML](https://code.google.com/p/php-yaml/)__ by _Bryan Davis_: The Yaml PHP Extension provides a wrapper to the LibYAML library.
* __[LibYAML](http://pyyaml.org/wiki/LibYAML)__ by _Kirill Simonov_: A YAML 1.1 parser and emitter written in C.
* __[cURL](http://curl.haxx.se/)__: cURL is a command line tool for transferring data with URL syntax
* __[Zlib](http://www.zlib.net/)__: A Massively Spiffy Yet Delicately Unobtrusive Compression Library
* __[Source RCON Protocol](https://developer.valvesoftware.com/wiki/Source_RCON_Protocol)__
* __[UT3 Query Protocol](http://wiki.unrealadmin.org/UT3_query_protocol)__
