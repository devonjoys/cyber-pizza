# Guardian Devil/Cyber-Pizza
Personal network security device developed for Duke.

## Device Description: 

The 2019 Code+ project designed a personal network security device to provide a version of Duke’s robust network security system to home users. After surveying Duke staff and faculty, we incorporated their feedback to design a web interface that leverages several different Linux-based tools in a simple and easy-to use platform. We designed our device with the following three principles in mind:

- **Security**: Guardian Devil monitors your network so you don't have to! All devices connected to it will be subject to basic port scans and will take advantage of Guardian Devil's malware blocker and threat intelligence feeds. You will be notified if Guardian Devil detects suspicious activity on your network.

- **Ease of Use**: Guardian Devil can be as hands-on or as hands-free as you would like it to be. It scans your network in the background, but it also provides in-depth summaries of network statistics so that you can be more informed about what is happening on your network.

- **Resource Access**: Guardian Devil offers VPN access so that you can use Duke's wealth of resources even when you're at home! Any devices connected to Guardian Devil when VPN is enabled will behave as if they were on Duke's main networks.

## Guardian Devil provides the following functionality:

- **Adblock**	Implements OpenWRT’s luci adblock to act as a DNS sinkhole and block advertisements and malware sources.
Performance	-Runs regular speed tests to analyze network performance. These are graphed and logged for easy use. Users can run manual speed tests and choose the frequency of automatic tests. Users are notified by email if speeds drop noticeably.

- **Firewall**	Incorporates intelligence feeds to block access to malicious IP addresses. These can be customized and manually blocked on the firewall page. 

- **VPN**		Connects to a Duke Virtual Machine using OpenVPN to provide network-wide full-tunnel VPN access. 

- **Router**		Uses the default luci network interface to provide back-end network configuration. Only advanced users should make changes to this interface.

- **Scanning**	Scans ports of connected devices to check for open ports. Users are notified by email if 3 or more ports are open or if a new device connects.

- **Settings**	Users can modify their network settings or changed advanced settings, if they so desire. 

- **Help**		Hosts a wide array of help pages to help users understand how to use various features and how they work.
Status		-Displays status icons on the dashboard, informing users of whether adblock is enabled, whether VPN is active, and whether they have internet access.

- **Live Feed**	Incorporates live Twitter feed from Duke OIT (or another resource) for tech tips and alerts.
Guardian Devil hosts these features from a Raspberry Pi Model 3B, providing a low-cost solution to the presented problem.
