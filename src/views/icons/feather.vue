<script>
import { ActivityIcon, AirplayIcon, AlertCircleIcon, AlertOctagonIcon, AlertTriangleIcon, AlignCenterIcon, AlignJustifyIcon, AlignLeftIcon, AlignRightIcon, AnchorIcon, ApertureIcon, ArchiveIcon, ArrowDownCircleIcon, ArrowDownLeftIcon, ArrowDownRightIcon, ArrowDownIcon, ArrowLeftCircleIcon, ArrowLeftIcon, ArrowRightCircleIcon, ArrowRightIcon, ArrowUpCircleIcon, ArrowUpLeftIcon, ArrowUpRightIcon, ArrowUpIcon, AtSignIcon, AwardIcon, BarChart2Icon, BarChartIcon, BatteryChargingIcon, BatteryIcon, BellOffIcon, BellIcon, BluetoothIcon, BoldIcon, BookOpenIcon, BookIcon, BookmarkIcon, BoxIcon, BriefcaseIcon, CalendarIcon, CameraOffIcon, CameraIcon, CastIcon, CheckCircleIcon, CheckSquareIcon, CheckIcon, ChevronDownIcon, ChevronLeftIcon, ChevronRightIcon, ChevronUpIcon, ChevronsDownIcon, ChevronsLeftIcon, ChevronsRightIcon, ChevronsUpIcon, ChromeIcon, CircleIcon, ClipboardIcon, ClockIcon, CloudDrizzleIcon, CloudLightningIcon, CloudOffIcon, CloudRainIcon, CloudSnowIcon, CloudIcon, CodeIcon, CodepenIcon, CodesandboxIcon, CoffeeIcon, ColumnsIcon, CommandIcon, CompassIcon, CopyIcon, CornerDownLeftIcon, CornerDownRightIcon, CornerLeftDownIcon, CornerLeftUpIcon, CornerRightDownIcon, CornerRightUpIcon, CornerUpLeftIcon, CornerUpRightIcon, CpuIcon, CreditCardIcon, CropIcon, CrosshairIcon, DatabaseIcon, DeleteIcon, DiscIcon, DivideCircleIcon, DivideSquareIcon, DivideIcon, DollarSignIcon, DownloadCloudIcon, DownloadIcon, DribbbleIcon, DropletIcon, Edit2Icon, Edit3Icon, EditIcon, ExternalLinkIcon, EyeOffIcon, EyeIcon, FacebookIcon, FastForwardIcon, FeatherIcon, FigmaIcon, FileMinusIcon, FilePlusIcon, FileTextIcon, FileIcon, FilmIcon, FilterIcon, FlagIcon, FolderMinusIcon, FolderPlusIcon, FolderIcon, FramerIcon, FrownIcon, GiftIcon, GitBranchIcon, GitCommitIcon, GitMergeIcon, GitPullRequestIcon, GithubIcon, GitlabIcon, GlobeIcon, GridIcon, HardDriveIcon, HashIcon, HeadphonesIcon, HeartIcon, HelpCircleIcon, HexagonIcon, HomeIcon, ImageIcon, InboxIcon, InfoIcon, InstagramIcon, ItalicIcon, KeyIcon, LayersIcon, LayoutIcon, LifeBuoyIcon, Link2Icon, LinkIcon, LinkedinIcon, ListIcon, LoaderIcon, LockIcon, LogInIcon, LogOutIcon, MailIcon, MapPinIcon, MapIcon, Maximize2Icon, MaximizeIcon, MehIcon, MenuIcon, MessageCircleIcon, MessageSquareIcon, MicOffIcon, MicIcon, Minimize2Icon, MinimizeIcon, MinusCircleIcon, MinusSquareIcon, MinusIcon, MonitorIcon, MoonIcon, MoreHorizontalIcon, MoreVerticalIcon, MousePointerIcon, MoveIcon, MusicIcon, Navigation2Icon, NavigationIcon, OctagonIcon, PackageIcon, PaperclipIcon, PauseCircleIcon, PauseIcon, PenToolIcon, PercentIcon, PhoneCallIcon, PhoneForwardedIcon, PhoneIncomingIcon, PhoneMissedIcon, PhoneOffIcon, PhoneOutgoingIcon, PhoneIcon, PieChartIcon, PlayCircleIcon, PlayIcon, PlusCircleIcon, PlusSquareIcon, PlusIcon, PocketIcon, PowerIcon, PrinterIcon, RadioIcon, RefreshCcwIcon, RefreshCwIcon, RepeatIcon, RewindIcon, RotateCcwIcon, RotateCwIcon, RssIcon, SaveIcon, ScissorsIcon, SearchIcon, SendIcon, ServerIcon, SettingsIcon, Share2Icon, ShareIcon, ShieldOffIcon, ShieldIcon, ShoppingBagIcon, ShoppingCartIcon, ShuffleIcon, SidebarIcon, SkipBackIcon, SkipForwardIcon, SlackIcon, SlashIcon, SlidersIcon, SmartphoneIcon, SmileIcon, SpeakerIcon, SquareIcon, StarIcon, StopCircleIcon, SunIcon, SunriseIcon, SunsetIcon, TabletIcon, TagIcon, TargetIcon, TerminalIcon, ThermometerIcon, ThumbsDownIcon, ThumbsUpIcon, ToggleLeftIcon, ToggleRightIcon, ToolIcon, Trash2Icon, TrashIcon, TrelloIcon, TrendingDownIcon, TrendingUpIcon, TriangleIcon, TruckIcon, TvIcon, TwitchIcon, TwitterIcon, TypeIcon, UmbrellaIcon, UnderlineIcon, UnlockIcon, UploadCloudIcon, UploadIcon, UserCheckIcon, UserMinusIcon, UserPlusIcon, UserXIcon, UserIcon, UsersIcon, VideoOffIcon, VideoIcon, VoicemailIcon, Volume1Icon, Volume2Icon, VolumeXIcon, VolumeIcon, WatchIcon, WifiOffIcon, WifiIcon, WindIcon, XCircleIcon, XOctagonIcon, XSquareIcon, XIcon, YoutubeIcon, ZapOffIcon, ZapIcon, ZoomInIcon, ZoomOutIcon } from "@zhuowenli/vue-feather-icons";

import Layout from "../../layouts/main.vue";
import PageHeader from "@/components/page-header";
import appConfig from "../../../app.config";

export default {
    page: {
        title: "Feather",
        meta: [{ name: "description", content: appConfig.description }],
    },
    data() {
        return {
            title: "Feather",
            items: [
                {
                    text: "Icons",
                    href: "/",
                },
                {
                    text: "Feather",
                    active: true,
                },
            ],
        };
    },
    components: {
        Layout,
        PageHeader,
        ActivityIcon,
        AirplayIcon,
        AlertCircleIcon,
        AlertOctagonIcon,
        AlertTriangleIcon,
        AlignCenterIcon,
        AlignJustifyIcon,
        AlignLeftIcon,
        AlignRightIcon,
        AnchorIcon,
        ApertureIcon,
        ArchiveIcon,
        ArrowDownCircleIcon,
        ArrowDownLeftIcon,
        ArrowDownRightIcon,
        ArrowDownIcon,
        ArrowLeftCircleIcon,
        ArrowLeftIcon,
        ArrowRightCircleIcon,
        ArrowRightIcon,
        ArrowUpCircleIcon,
        ArrowUpLeftIcon,
        ArrowUpRightIcon,
        ArrowUpIcon,
        AtSignIcon,
        AwardIcon,
        BarChart2Icon,
        BarChartIcon,
        BatteryChargingIcon,
        BatteryIcon,
        BellOffIcon,
        BellIcon,
        BluetoothIcon,
        BoldIcon,
        BookOpenIcon,
        BookIcon,
        BookmarkIcon,
        BoxIcon,
        BriefcaseIcon,
        CalendarIcon,
        CameraOffIcon,
        CameraIcon,
        CastIcon,
        CheckCircleIcon,
        CheckSquareIcon,
        CheckIcon,
        ChevronDownIcon,
        ChevronLeftIcon,
        ChevronRightIcon,
        ChevronUpIcon,
        ChevronsDownIcon,
        ChevronsLeftIcon,
        ChevronsRightIcon,
        ChevronsUpIcon,
        ChromeIcon,
        CircleIcon,
        ClipboardIcon,
        ClockIcon,
        CloudDrizzleIcon,
        CloudLightningIcon,
        CloudOffIcon,
        CloudRainIcon,
        CloudSnowIcon,
        CloudIcon,
        CodeIcon,
        CodepenIcon,
        CodesandboxIcon,
        CoffeeIcon,
        ColumnsIcon,
        CommandIcon,
        CompassIcon,
        CopyIcon,
        CornerDownLeftIcon,
        CornerDownRightIcon,
        CornerLeftDownIcon,
        CornerLeftUpIcon,
        CornerRightDownIcon,
        CornerRightUpIcon,
        CornerUpLeftIcon,
        CornerUpRightIcon,
        CpuIcon,
        CreditCardIcon,
        CropIcon,
        CrosshairIcon,
        DatabaseIcon,
        DeleteIcon,
        DiscIcon,
        DivideCircleIcon,
        DivideSquareIcon,
        DivideIcon,
        DollarSignIcon,
        DownloadCloudIcon,
        DownloadIcon,
        DribbbleIcon,
        DropletIcon,
        Edit2Icon,
        Edit3Icon,
        EditIcon,
        ExternalLinkIcon,
        EyeOffIcon,
        EyeIcon,
        FacebookIcon,
        FastForwardIcon,
        FeatherIcon,
        FigmaIcon,
        FileMinusIcon,
        FilePlusIcon,
        FileTextIcon,
        FileIcon,
        FilmIcon,
        FilterIcon,
        FlagIcon,
        FolderMinusIcon,
        FolderPlusIcon,
        FolderIcon,
        FramerIcon,
        FrownIcon,
        GiftIcon,
        GitBranchIcon,
        GitCommitIcon,
        GitMergeIcon,
        GitPullRequestIcon,
        GithubIcon,
        GitlabIcon,
        GlobeIcon,
        GridIcon,
        HardDriveIcon,
        HashIcon,
        HeadphonesIcon,
        HeartIcon,
        HelpCircleIcon,
        HexagonIcon,
        HomeIcon,
        ImageIcon,
        InboxIcon,
        InfoIcon,
        InstagramIcon,
        ItalicIcon,
        KeyIcon,
        LayersIcon,
        LayoutIcon,
        LifeBuoyIcon,
        Link2Icon,
        LinkIcon,
        LinkedinIcon,
        ListIcon,
        LoaderIcon,
        LockIcon,
        LogInIcon,
        LogOutIcon,
        MailIcon,
        MapPinIcon,
        MapIcon,
        Maximize2Icon,
        MaximizeIcon,
        MehIcon,
        MenuIcon,
        MessageCircleIcon,
        MessageSquareIcon,
        MicOffIcon,
        MicIcon,
        Minimize2Icon,
        MinimizeIcon,
        MinusCircleIcon,
        MinusSquareIcon,
        MinusIcon,
        MonitorIcon,
        MoonIcon,
        MoreHorizontalIcon,
        MoreVerticalIcon,
        MousePointerIcon,
        MoveIcon,
        MusicIcon,
        Navigation2Icon,
        NavigationIcon,
        OctagonIcon,
        PackageIcon,
        PaperclipIcon,
        PauseCircleIcon,
        PauseIcon,
        PenToolIcon,
        PercentIcon,
        PhoneCallIcon,
        PhoneForwardedIcon,
        PhoneIncomingIcon,
        PhoneMissedIcon,
        PhoneOffIcon,
        PhoneOutgoingIcon,
        PhoneIcon,
        PieChartIcon,
        PlayCircleIcon,
        PlayIcon,
        PlusCircleIcon,
        PlusSquareIcon,
        PlusIcon,
        PocketIcon,
        PowerIcon,
        PrinterIcon,
        RadioIcon,
        RefreshCcwIcon,
        RefreshCwIcon,
        RepeatIcon,
        RewindIcon,
        RotateCcwIcon,
        RotateCwIcon,
        RssIcon,
        SaveIcon,
        ScissorsIcon,
        SearchIcon,
        SendIcon,
        ServerIcon,
        SettingsIcon,
        Share2Icon,
        ShareIcon,
        ShieldOffIcon,
        ShieldIcon,
        ShoppingBagIcon,
        ShoppingCartIcon,
        ShuffleIcon,
        SidebarIcon,
        SkipBackIcon,
        SkipForwardIcon,
        SlackIcon,
        SlashIcon,
        SlidersIcon,
        SmartphoneIcon,
        SmileIcon,
        SpeakerIcon,
        SquareIcon,
        StarIcon,
        StopCircleIcon,
        SunIcon,
        SunriseIcon,
        SunsetIcon,
        TabletIcon,
        TagIcon,
        TargetIcon,
        TerminalIcon,
        ThermometerIcon,
        ThumbsDownIcon,
        ThumbsUpIcon,
        ToggleLeftIcon,
        ToggleRightIcon,
        ToolIcon,
        Trash2Icon,
        TrashIcon,
        TrelloIcon,
        TrendingDownIcon,
        TrendingUpIcon,
        TriangleIcon,
        TruckIcon,
        TvIcon,
        TwitchIcon,
        TwitterIcon,
        TypeIcon,
        UmbrellaIcon,
        UnderlineIcon,
        UnlockIcon,
        UploadCloudIcon,
        UploadIcon,
        UserCheckIcon,
        UserMinusIcon,
        UserPlusIcon,
        UserXIcon,
        UserIcon,
        UsersIcon,
        VideoOffIcon,
        VideoIcon,
        VoicemailIcon,
        Volume1Icon,
        Volume2Icon,
        VolumeXIcon,
        VolumeIcon,
        WatchIcon,
        WifiOffIcon,
        WifiIcon,
        WindIcon,
        XCircleIcon,
        XOctagonIcon,
        XSquareIcon,
        XIcon,
        YoutubeIcon,
        ZapOffIcon,
        ZapIcon,
        ZoomInIcon,
        ZoomOutIcon
    },
};
</script>

<template>
    <Layout>
        <PageHeader :title="title" :items="items" />
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Examples</h4>
                        <p class="text-muted mb-0">
                            Use
                            <code>&lt;i data-feather="**">&lt;/i></code> class.
                        </p>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row icon-demo-content">
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <ActivityIcon></ActivityIcon>activity
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <AirplayIcon></AirplayIcon>airplay
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <AlertCircleIcon></AlertCircleIcon>alert-circle
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <AlertOctagonIcon></AlertOctagonIcon>AlertOctagonIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <AlertTriangleIcon></AlertTriangleIcon>AlertTriangleIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <AlignCenterIcon></AlignCenterIcon>AlignCenterIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <AlignJustifyIcon></AlignJustifyIcon>AlignJustifyIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <AlignLeftIcon></AlignLeftIcon>AlignLeftIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <AlignRightIcon></AlignRightIcon>AlignRightIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <AnchorIcon></AnchorIcon>AnchorIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <ApertureIcon></ApertureIcon>ApertureIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <ArchiveIcon></ArchiveIcon>ArchiveIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <ArrowDownCircleIcon></ArrowDownCircleIcon>ArrowDownCircleIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <ArrowDownLeftIcon></ArrowDownLeftIcon>ArrowDownLeftIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <ArrowDownRightIcon></ArrowDownRightIcon>ArrowDownRightIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <ArrowDownIcon></ArrowDownIcon>ArrowDownIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <ArrowLeftCircleIcon></ArrowLeftCircleIcon>ArrowLeftCircleIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <ArrowLeftIcon></ArrowLeftIcon>ArrowLeftIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <ArrowRightCircleIcon></ArrowRightCircleIcon>ArrowRightCircleIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <ArrowRightIcon></ArrowRightIcon>ArrowRightIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <ArrowUpCircleIcon></ArrowUpCircleIcon>ArrowUpCircleIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <ArrowUpLeftIcon></ArrowUpLeftIcon>ArrowUpLeftIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <ArrowUpRightIcon></ArrowUpRightIcon>ArrowUpRightIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <ArrowUpIcon></ArrowUpIcon>ArrowUpIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <AtSignIcon></AtSignIcon>AtSignIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <AwardIcon></AwardIcon>AwardIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <BarChart2Icon></BarChart2Icon>BarChart2Icon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <BarChartIcon></BarChartIcon>BarChartIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <BatteryChargingIcon></BatteryChargingIcon>BatteryChargingIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <BatteryIcon></BatteryIcon>BatteryIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <BellOffIcon></BellOffIcon>BellOffIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <BellIcon></BellIcon>BellIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <BluetoothIcon></BluetoothIcon>BluetoothIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <BoldIcon></BoldIcon>BoldIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <BookOpenIcon></BookOpenIcon>BookOpenIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <BookIcon></BookIcon>BookIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <BookmarkIcon></BookmarkIcon>BookmarkIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <BoxIcon></BoxIcon>BoxIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <BriefcaseIcon></BriefcaseIcon>BriefcaseIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <CalendarIcon></CalendarIcon>CalendarIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <CameraOffIcon></CameraOffIcon>CameraOffIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <CameraIcon></CameraIcon>CameraIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <CastIcon></CastIcon>CastIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <CheckCircleIcon></CheckCircleIcon>CheckCircleIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <CheckSquareIcon></CheckSquareIcon>CheckSquareIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <CheckIcon></CheckIcon>CheckIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <ChevronDownIcon></ChevronDownIcon>ChevronDownIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <ChevronLeftIcon></ChevronLeftIcon>ChevronLeftIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <ChevronRightIcon></ChevronRightIcon>ChevronRightIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <ChevronUpIcon></ChevronUpIcon>ChevronUpIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <ChevronsDownIcon></ChevronsDownIcon>ChevronsDownIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <ChevronsLeftIcon></ChevronsLeftIcon>ChevronsLeftIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <ChevronsRightIcon></ChevronsRightIcon>ChevronsRightIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <ChevronsUpIcon></ChevronsUpIcon>ChevronsUpIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <ChromeIcon></ChromeIcon>ChromeIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <CircleIcon></CircleIcon>CircleIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <ClipboardIcon></ClipboardIcon>ClipboardIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <ClockIcon></ClockIcon>ClockIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <CloudDrizzleIcon></CloudDrizzleIcon>CloudDrizzleIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <CloudLightningIcon></CloudLightningIcon>CloudLightningIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <CloudOffIcon></CloudOffIcon>CloudOffIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <CloudRainIcon></CloudRainIcon>CloudRainIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <CloudSnowIcon></CloudSnowIcon>CloudSnowIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <CloudIcon></CloudIcon>CloudIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <CodeIcon></CodeIcon>CodeIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <CodepenIcon></CodepenIcon>CodepenIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <CodesandboxIcon></CodesandboxIcon>CodesandboxIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <CoffeeIcon></CoffeeIcon>CoffeeIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <ColumnsIcon></ColumnsIcon>ColumnsIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <CommandIcon></CommandIcon>CommandIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <CompassIcon></CompassIcon>CompassIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <CopyIcon></CopyIcon>CopyIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <CornerDownLeftIcon></CornerDownLeftIcon>CornerDownLeftIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <CornerDownRightIcon></CornerDownRightIcon>CornerDownRightIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <CornerLeftDownIcon></CornerLeftDownIcon>CornerLeftDownIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <CornerLeftUpIcon></CornerLeftUpIcon>CornerLeftUpIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <CornerRightDownIcon></CornerRightDownIcon>CornerRightDownIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <CornerRightUpIcon></CornerRightUpIcon>CornerRightUpIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <CornerUpLeftIcon></CornerUpLeftIcon>CornerUpLeftIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <CornerUpRightIcon></CornerUpRightIcon>CornerUpRightIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <CpuIcon></CpuIcon>CpuIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <CreditCardIcon></CreditCardIcon>CreditCardIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <CropIcon></CropIcon>CropIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <CrosshairIcon></CrosshairIcon>CrosshairIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <DatabaseIcon></DatabaseIcon>DatabaseIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <DeleteIcon></DeleteIcon>DeleteIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <DiscIcon></DiscIcon>DiscIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <DivideCircleIcon></DivideCircleIcon>DivideCircleIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <DivideSquareIcon></DivideSquareIcon>DivideSquareIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <DivideIcon></DivideIcon>DivideIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <DollarSignIcon></DollarSignIcon>DollarSignIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <DownloadCloudIcon></DownloadCloudIcon>DownloadCloudIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <DownloadIcon></DownloadIcon>DownloadIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <DribbbleIcon></DribbbleIcon>DribbbleIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <DropletIcon></DropletIcon>DropletIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <Edit2Icon></Edit2Icon>Edit2Icon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <Edit3Icon></Edit3Icon>Edit3Icon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <EditIcon></EditIcon>EditIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <ExternalLinkIcon></ExternalLinkIcon>ExternalLinkIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <EyeOffIcon></EyeOffIcon>EyeOffIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <EyeIcon></EyeIcon>EyeIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <FacebookIcon></FacebookIcon>FacebookIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <FastForwardIcon></FastForwardIcon>FastForwardIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <FeatherIcon></FeatherIcon>FeatherIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <FigmaIcon></FigmaIcon>FigmaIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <FileMinusIcon></FileMinusIcon>FileMinusIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <FilePlusIcon></FilePlusIcon>FilePlusIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <FileTextIcon></FileTextIcon>FileTextIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <FileIcon></FileIcon>FileIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <FilmIcon></FilmIcon>FilmIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <FilterIcon></FilterIcon>FilterIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <FlagIcon></FlagIcon>FlagIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <FolderMinusIcon></FolderMinusIcon>FolderMinusIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <FolderPlusIcon></FolderPlusIcon>FolderPlusIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <FolderIcon></FolderIcon>FolderIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <FramerIcon></FramerIcon>FramerIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <FrownIcon></FrownIcon>FrownIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <GiftIcon></GiftIcon>GiftIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <GitBranchIcon></GitBranchIcon>GitBranchIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <GitCommitIcon></GitCommitIcon>GitCommitIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <GitMergeIcon></GitMergeIcon>GitMergeIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <GitPullRequestIcon></GitPullRequestIcon>GitPullRequestIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <GithubIcon></GithubIcon>GithubIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <GitlabIcon></GitlabIcon>GitlabIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <GlobeIcon></GlobeIcon>GlobeIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <GridIcon></GridIcon>GridIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <HardDriveIcon></HardDriveIcon>HardDriveIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <HashIcon></HashIcon>HashIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <HeadphonesIcon></HeadphonesIcon>HeadphonesIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <HeartIcon></HeartIcon>HeartIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <HelpCircleIcon></HelpCircleIcon>HelpCircleIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <HexagonIcon></HexagonIcon>HexagonIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <HomeIcon></HomeIcon>HomeIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <ImageIcon></ImageIcon>ImageIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <InboxIcon></InboxIcon>InboxIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <InfoIcon></InfoIcon>InfoIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <InstagramIcon></InstagramIcon>InstagramIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <ItalicIcon></ItalicIcon>ItalicIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <KeyIcon></KeyIcon>KeyIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <LayersIcon></LayersIcon>LayersIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <LayoutIcon></LayoutIcon>LayoutIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <LifeBuoyIcon></LifeBuoyIcon>LifeBuoyIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <Link2Icon></Link2Icon>Link2Icon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <LinkIcon></LinkIcon>LinkIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <LinkedinIcon></LinkedinIcon>LinkedinIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <ListIcon></ListIcon>ListIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <LoaderIcon></LoaderIcon>LoaderIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <LockIcon></LockIcon>LockIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <LogInIcon></LogInIcon>LogInIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <LogOutIcon></LogOutIcon>LogOutIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <MailIcon></MailIcon>MailIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <MapPinIcon></MapPinIcon>MapPinIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <MapIcon></MapIcon>MapIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <Maximize2Icon></Maximize2Icon>Maximize2Icon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <MaximizeIcon></MaximizeIcon>MaximizeIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <MehIcon></MehIcon>MehIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <MenuIcon></MenuIcon>MenuIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <MessageCircleIcon></MessageCircleIcon>MessageCircleIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <MessageSquareIcon></MessageSquareIcon>MessageSquareIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <MicOffIcon></MicOffIcon>MicOffIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <MicIcon></MicIcon>MicIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <Minimize2Icon></Minimize2Icon>Minimize2Icon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <MinimizeIcon></MinimizeIcon>MinimizeIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <MinusCircleIcon></MinusCircleIcon>MinusCircleIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <MinusSquareIcon></MinusSquareIcon>MinusSquareIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <MinusIcon></MinusIcon>MinusIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <MonitorIcon></MonitorIcon>MonitorIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <MoonIcon></MoonIcon>MoonIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <MoreHorizontalIcon></MoreHorizontalIcon>MoreHorizontalIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <MoreVerticalIcon></MoreVerticalIcon>MoreVerticalIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <MousePointerIcon></MousePointerIcon>MousePointerIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <MoveIcon></MoveIcon>MoveIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <MusicIcon></MusicIcon>MusicIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <Navigation2Icon></Navigation2Icon>Navigation2Icon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <NavigationIcon></NavigationIcon>NavigationIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <OctagonIcon></OctagonIcon>OctagonIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <PackageIcon></PackageIcon>PackageIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <PaperclipIcon></PaperclipIcon>PaperclipIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <PauseCircleIcon></PauseCircleIcon>PauseCircleIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <PauseIcon></PauseIcon>PauseIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <PenToolIcon></PenToolIcon>PenToolIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <PercentIcon></PercentIcon>PercentIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <PhoneCallIcon></PhoneCallIcon>PhoneCallIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <PhoneForwardedIcon></PhoneForwardedIcon>PhoneForwardedIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <PhoneIncomingIcon></PhoneIncomingIcon>PhoneIncomingIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <PhoneMissedIcon></PhoneMissedIcon>PhoneMissedIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <PhoneOffIcon></PhoneOffIcon>PhoneOffIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <PhoneOutgoingIcon></PhoneOutgoingIcon>PhoneOutgoingIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <PhoneIcon></PhoneIcon>PhoneIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <PieChartIcon></PieChartIcon>PieChartIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <PlayCircleIcon></PlayCircleIcon>PlayCircleIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <PlayIcon></PlayIcon>PlayIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <PlusCircleIcon></PlusCircleIcon>PlusCircleIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <PlusSquareIcon></PlusSquareIcon>PlusSquareIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <PlusIcon></PlusIcon>PlusIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <PocketIcon></PocketIcon>PocketIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <PowerIcon></PowerIcon>PowerIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <PrinterIcon></PrinterIcon>PrinterIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <RadioIcon></RadioIcon>RadioIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <RefreshCcwIcon></RefreshCcwIcon>RefreshCcwIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <RefreshCwIcon></RefreshCwIcon>RefreshCwIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <RepeatIcon></RepeatIcon>RepeatIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <RewindIcon></RewindIcon>RewindIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <RotateCcwIcon></RotateCcwIcon>RotateCcwIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <RotateCwIcon></RotateCwIcon>RotateCwIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <RssIcon></RssIcon>RssIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <SaveIcon></SaveIcon>SaveIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <ScissorsIcon></ScissorsIcon>ScissorsIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <SearchIcon></SearchIcon>SearchIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <SendIcon></SendIcon>SendIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <ServerIcon></ServerIcon>ServerIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <SettingsIcon></SettingsIcon>SettingsIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <Share2Icon></Share2Icon>Share2Icon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <ShareIcon></ShareIcon>ShareIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <ShieldOffIcon></ShieldOffIcon>ShieldOffIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <ShieldIcon></ShieldIcon>ShieldIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <ShoppingBagIcon></ShoppingBagIcon>ShoppingBagIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <ShoppingCartIcon></ShoppingCartIcon>ShoppingCartIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <ShuffleIcon></ShuffleIcon>ShuffleIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <SidebarIcon></SidebarIcon>SidebarIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <SkipBackIcon></SkipBackIcon>SkipBackIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <SkipForwardIcon></SkipForwardIcon>SkipForwardIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <SlackIcon></SlackIcon>SlackIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <SlashIcon></SlashIcon>SlashIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <SlidersIcon></SlidersIcon>SlidersIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <SmartphoneIcon></SmartphoneIcon>SmartphoneIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <SmileIcon></SmileIcon>SmileIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <SpeakerIcon></SpeakerIcon>SpeakerIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <SquareIcon></SquareIcon>SquareIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <StarIcon></StarIcon>StarIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <StopCircleIcon></StopCircleIcon>StopCircleIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <SunIcon></SunIcon>SunIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <SunriseIcon></SunriseIcon>SunriseIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <SunsetIcon></SunsetIcon>SunsetIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <TabletIcon></TabletIcon>TabletIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <TagIcon></TagIcon>TagIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <TargetIcon></TargetIcon>TargetIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <TerminalIcon></TerminalIcon>TerminalIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <ThermometerIcon></ThermometerIcon>ThermometerIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <ThumbsDownIcon></ThumbsDownIcon>ThumbsDownIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <ThumbsUpIcon></ThumbsUpIcon>ThumbsUpIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <ToggleLeftIcon></ToggleLeftIcon>ToggleLeftIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <ToggleRightIcon></ToggleRightIcon>ToggleRightIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <ToolIcon></ToolIcon>ToolIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <Trash2Icon></Trash2Icon>Trash2Icon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <TrashIcon></TrashIcon>TrashIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <TrelloIcon></TrelloIcon>TrelloIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <TrendingDownIcon></TrendingDownIcon>TrendingDownIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <TrendingUpIcon></TrendingUpIcon>TrendingUpIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <TriangleIcon></TriangleIcon>TriangleIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <TruckIcon></TruckIcon>TruckIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <TvIcon></TvIcon>TvIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <TwitchIcon></TwitchIcon>TwitchIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <TwitterIcon></TwitterIcon>TwitterIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <TypeIcon></TypeIcon>TypeIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <UmbrellaIcon></UmbrellaIcon>UmbrellaIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <UnderlineIcon></UnderlineIcon>UnderlineIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <UnlockIcon></UnlockIcon>UnlockIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <UploadCloudIcon></UploadCloudIcon>UploadCloudIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <UploadIcon></UploadIcon>UploadIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <UserCheckIcon></UserCheckIcon>UserCheckIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <UserMinusIcon></UserMinusIcon>UserMinusIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <UserPlusIcon></UserPlusIcon>UserPlusIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <UserXIcon></UserXIcon>UserXIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <UserIcon></UserIcon>UserIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <UsersIcon></UsersIcon>UsersIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <VideoOffIcon></VideoOffIcon>VideoOffIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <VideoIcon></VideoIcon>VideoIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <VoicemailIcon></VoicemailIcon>VoicemailIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <Volume1Icon></Volume1Icon>Volume1Icon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <Volume2Icon></Volume2Icon>Volume2Icon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <VolumeXIcon></VolumeXIcon>VolumeXIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <VolumeIcon></VolumeIcon>VolumeIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <WatchIcon></WatchIcon>WatchIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <WifiOffIcon></WifiOffIcon>WifiOffIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <WifiIcon></WifiIcon>WifiIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <WindIcon></WindIcon>WindIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <XCircleIcon></XCircleIcon>XCircleIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <XOctagonIcon></XOctagonIcon>XOctagonIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <XSquareIcon></XSquareIcon>XSquareIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <XIcon></XIcon>XIcon,
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <YoutubeIcon></YoutubeIcon>YoutubeIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <ZapOffIcon></ZapOffIcon>ZapOffIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <ZapIcon></ZapIcon>ZapIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <ZoomInIcon></ZoomInIcon>ZoomInIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <ZoomOutIcon></ZoomOutIcon>ZoomOutIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <AirplayIcon></AirplayIcon>AirplayIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <AirplayIcon></AirplayIcon>AirplayIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <AirplayIcon></AirplayIcon>AirplayIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <AirplayIcon></AirplayIcon>AirplayIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <AirplayIcon></AirplayIcon>AirplayIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <AirplayIcon></AirplayIcon>AirplayIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <AirplayIcon></AirplayIcon>AirplayIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <AlertCircleIcon></AlertCircleIcon>AlertCircleIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <AlertOctagonIcon></AlertOctagonIcon>AlertOctagonIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <AlertTriangleIcon></AlertTriangleIcon>AlertTriangleIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <AnchorIcon></AnchorIcon>AnchorIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <ApertureIcon></ApertureIcon>ApertureIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <ArchiveIcon></ArchiveIcon>ArchiveIcon
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <ClockIcon></ClockIcon>ClockIcon
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Sizes</h4>
                        <p class="text-muted mb-0">
                            Use
                            <code>&lt;i data-feather="activity" class="icon-**"&gt;&lt;/i&gt;</code>. Available sizes
                            <code>xs, sm,md,lg,xl,xxl</code>
                        </p>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row icon-demo-content">
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <AirplayIcon class="icon-xs"></AirplayIcon>airplay
                            </div>

                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <AirplayIcon class="icon-sm"></AirplayIcon>airplay
                            </div>

                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <AirplayIcon class="icon-md"></AirplayIcon>airplay
                            </div>

                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <AirplayIcon class="icon-lg"></AirplayIcon>airplay
                            </div>

                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <AirplayIcon class="icon-xl"></AirplayIcon>airplay
                            </div>

                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <AirplayIcon class="icon-xxl"></AirplayIcon>airplay
                            </div>
                        </div>
                        <!-- emd row -->
                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Two Tones Color Icons</h4>
                        <p class="text-muted mb-0">
                            Use
                            <code>&lt;i data-feather="activity" class="icon-dual-**"&gt;&lt;/i&gt;</code>.
                        </p>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row icon-demo-content">
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <AirplayIcon class="icon-dual"></AirplayIcon>airplay
                            </div>

                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <AlertCircleIcon class="icon-dual-primary"></AlertCircleIcon>alert-circle
                            </div>

                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <AlertOctagonIcon class="icon-dual-success"></AlertOctagonIcon>alert-octagon
                            </div>

                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <AlertTriangleIcon class="icon-dual-info"></AlertTriangleIcon>alert-triangle
                            </div>

                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <AnchorIcon class="icon-dual-warning"></AnchorIcon>anchor
                            </div>

                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <ApertureIcon class="icon-dual-danger"></ApertureIcon>aperture
                            </div>

                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <ArchiveIcon class="icon-dual-dark"></ArchiveIcon>archive
                            </div>

                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <ClockIcon class="icon-dual-secondary"></ClockIcon>clock
                            </div>
                        </div>
                        <!-- emd row -->
                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </Layout>
</template>
