<?php exit;?>{
    "systemPassword": "2TAGgbpeWA4kjCsrZx5C",
    "systemName": "KodExplorer",
    "systemDesc": "——可道云.资源管理器",
    "pathHidden": "Thumb.db,.DS_Store,.gitignore,.git",
    "autoLogin": "0",
    "needCheckCode": "0",
    "firstIn": "explorer",
    "newUserApp": "",
    "newUserFolder": "document",
    "newGroupFolder": "share,doc,pictures",
    "groupShareFolder": "share",
    "desktopFolder": "desktop",
    "versionType": "A",
    "rootListUser": 0,
    "rootListGroup": 0,
    "csrfProtect": 0,
    "currentVersion": "4.40",
    "wallpageDesktop": "3,8,10",
    "wallpageLogin": "3,8,10",
    "menu": [
        {
            "name": "explorer",
            "type": "system",
            "url": "index.php?explorer",
            "target": "_self",
            "use": "1",
            "subMenu": "0"
        },
        {
            "name": "editor",
            "type": "system",
            "url": "index.php?editor",
            "target": "_self",
            "use": "1",
            "subMenu": "0"
        }
    ],
    "globalCss": "#version_vip_free,#version_vip_free{display:none !important;}\nbody .loginbox .open>.dropdown-menu{width: 120px;padding: 10px 0;}\nbody .loginbox .footer-language li{width: 100%;margin: 0;}\nbody .topbar .content .top-right ul.dropdown-menu.topbar-language{width: 150px;padding: 10px 0;}\nbody .topbar .content .top-right ul.dropdown-menu.topbar-language li{width: 100%;margin: 0px;}",
    "pluginList": {
        "photoSwipe": {
            "id": "photoSwipe",
            "regiest": {
                "user.commonJs.insert": "photoSwipePlugin.echoJs"
            },
            "status": 1,
            "config": {
                "pluginAuth": "all:1",
                "fileExt": "jpg,jpeg,png,bmp,gif,ico,svg,cur,webp",
                "fileSort": 20
            }
        },
        "jPlayer": {
            "id": "jPlayer",
            "regiest": {
                "user.commonJs.insert": "jPlayerPlugin.echoJs"
            },
            "status": 1,
            "config": {
                "pluginAuth": "all:1",
                "fileExt": "mp3,wav,m4a,aac,oga,ogg,webma,mp4,m4v,flv,mov,f4v,ogv,webm,webmv,m3u8a,m3ua,flac,fla,rtmp,rtmpa",
                "fileSort": 10
            }
        },
        "yzOffice": {
            "id": "yzOffice",
            "regiest": {
                "user.commonJs.insert": "yzOfficePlugin.echoJs"
            },
            "status": 1,
            "config": {
                "pluginAuth": "all:1",
                "openWith": "dialog",
                "fileExt": "doc,docx,docm,dot,dotx,dotm,rtf,wps,wpt,xls,xlsx,xlt,xlsm,csv,ppt,pptx,pps,ppsx",
                "fileSort": 50,
                "cacheFile": "1",
                "preview": "0"
            }
        },
        "zipView": {
            "id": "zipView",
            "regiest": {
                "user.commonJs.insert": "zipViewPlugin.echoJs"
            },
            "status": 1,
            "config": {
                "pluginAuth": "all:1",
                "fileExt": "zip,tar,gz,tgz,ipa,apk,rar,7z,iso,bz2,zx,z,arj,epub",
                "fileSort": 10
            }
        },
        "toolsCommon": {
            "id": "toolsCommon",
            "regiest": {
                "user.commonJs.insert": "toolsCommonPlugin.echoJs"
            },
            "status": 1,
            "config": []
        },
        "officeLive": {
            "id": "officeLive",
            "regiest": {
                "user.commonJs.insert": "officeLivePlugin.echoJs"
            },
            "status": 1,
            "config": {
                "pluginAuth": "all:1",
                "pluginAuthOpen": 0,
                "openWith": "dialog",
                "apiServer": "https:\/\/owa-box.vips100.com\/op\/view.aspx?src=",
                "fileExt": "doc,docx,docm,dot,dotx,dotm,rtf,xls,xlsx,xlt,xlsb,xlsm,csv,ppt,pptx,pps,ppsx,pptm,potm,ppam,potx,ppsm,odt,ods,odp,ott,ots,otp,wps,wpt",
                "fileSort": 5
            }
        },
        "adminer": {
            "id": "adminer",
            "regiest": {
                "templateCommonHeader": "adminerPlugin.addMenu"
            },
            "status": 1,
            "config": {
                "pluginAuth": "role:1",
                "menuSubMenu": 1
            }
        }
    }
}