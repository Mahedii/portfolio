<script>
export default {
    setup() {
        return {
            activities : [
    {
        id: 1,
        date: "25",
        weekDay: "Tue",
        time: "12:00am - 03:30pm",
        caption: "Meeting for campaign with sales team",
        subItem: [
            { id: 1, img: require("@/assets/images/users/avatar-1.jpg") },
            { id: 2, img: require("@/assets/images/users/avatar-2.jpg") },
            { id: 3, img: require("@/assets/images/users/avatar-3.jpg") }],
        imgNumber: "5",
        bgcolor: "bg-info"
    },
    {
        id: 2,
        date: "20",
        weekDay: "Wed",
        time: "02:00pm - 03:45pm",
        caption: "Adding a new event with attachments",
        subItem: [
            { id: 1, img: require("@/assets/images/users/avatar-4.jpg") },
            { id: 2, img: require("@/assets/images/users/avatar-5.jpg") },
            { id: 3, img: require("@/assets/images/users/avatar-6.jpg") },
            { id: 4, img: require("@/assets/images/users/avatar-7.jpg") }],
        imgNumber: "3",
        bgcolor: "bg-success"
    },
    {
        id: 3,
        date: "17",
        weekDay: "Wed",
        time: "04:30pm - 07:15pm",
        caption: "Create new project Bundling Product",
        subItem: [
            { id: 1, img: require("@/assets/images/users/avatar-8.jpg") },
            { id: 2, img: require("@/assets/images/users/avatar-1.jpg") },
            { id: 3, img: require("@/assets/images/users/avatar-2.jpg") }],
        imgNumber: "4",
        bgcolor: "bg-primary"
    },
    {
        id: 4,
        date: "12",
        weekDay: "Tue",
        time: "10:30am - 01:15pm",
        caption: "Weekly closed sales won checking with sales team",
        subItem: [
            { id: 1, img: require("@/assets/images/users/avatar-1.jpg") },
            { id: 2, img: require("@/assets/images/users/avatar-5.jpg") },
            { id: 3, img: require("@/assets/images/users/avatar-2.jpg") }],
        imgNumber: "9",
        bgcolor: "bg-warning"
    },
]
        }
    }
}
</script>

<template>
    <div class="card">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Upcoming Activities</h4>
            <div class="flex-shrink-0">
                <div class="dropdown card-header-dropdown">
                    <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="text-muted fs-18"><i class="mdi mdi-dots-vertical"></i></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="#">Edit</a>
                        <a class="dropdown-item" href="#">Remove</a>
                    </div>
                </div>
            </div>
        </div><!-- end card header -->
        <div class="card-body pt-0">
            <ul class="list-group list-group-flush border-dashed">
                <li class="list-group-item ps-0" v-for="(item , index) of activities" :key="index">
                    <div class="row align-items-center g-3">
                        <div class="col-auto">
                            <div class="avatar-sm p-1 py-2 h-auto bg-light rounded-3 shadow">
                                <div class="text-center">
                                        <h5 class="mb-0">{{item.date}}</h5>
                                        <div class="text-muted">{{item.weekDay}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <h5 class="text-muted mt-0 mb-1 fs-13">{{item.time}}</h5>
                            <a href="#" class="text-reset fs-14 mb-0">{{item.caption}}</a>
                        </div>
                        <div class="col-sm-auto">
                            <div class="avatar-group">
                                <div class="avatar-group-item shadow" v-for="(subitem, index) of item.subItem" :key="index">
                                    <a href="javascript: void(0);" class="d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Stine Nielsen">
                                        <img :src="`${subitem.img}`" alt="" class="rounded-circle avatar-xxs">
                                    </a>
                                </div>
                                
                                <div class="avatar-group-item shadow">
                                    <a href="javascript: void(0);">
                                        <div class="avatar-xxs">
                                            <span :class="`avatar-title rounded-circle ${item.bgcolor} text-white`">
                                                {{item.imgNumber}}
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </li><!-- end -->
                
            </ul><!-- end -->
            <div class="align-items-center mt-2 row g-3 text-center text-sm-start">
                <div class="col-sm">
                    <div class="text-muted">Showing<span class="fw-semibold">4</span> of <span class="fw-semibold">125</span> Results
                    </div>
                </div>
                <div class="col-sm-auto">
                    <ul class="pagination pagination-separated pagination-sm justify-content-center justify-content-sm-start mb-0">
                        <li class="page-item disabled">
                            <a href="#" class="page-link">←</a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link">1</a>
                        </li>
                        <li class="page-item active">
                            <a href="#" class="page-link">2</a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link">3</a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link">→</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div><!-- end card body -->
    </div><!-- end card -->
</template>