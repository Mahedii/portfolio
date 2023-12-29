<script>
    // import useCargo from "../../../composeables/cargo";
    // import { onMounted } from "vue";

    // const { allCargo, getAllCargo } = useCargo();
    // onMounted(() => {
    //     getAllCargo()
    // })
    // import { Axios } from "axios";
    // // import { ref } from "vue";
    // // import { useRouter } from "vue-router";
    // // axios.default.baseURL = "http://127.0.0.1:8000/cargo/list/";
    export default {
        // name:"allCargo",
        data(){
            return {
                data:{
                    allCargo: []
                }
            }
        },
        // created() {
        //     this.axios.get('/cargo/list/data').then(response=>{
        //             // console.localStorage(response.data);
        //             this.data.allCargo = response.data.cargoListData
        //         }).catch(error=>{
        //             console.log(error)
        //             this.data.allCargo = []
        //         });
        // },
        methods:{
            getAllCargo(){
                this.axios.get('/cargo/list/data').then(res=>{
                    // console.localStorage(res.data);
                    this.data.allCargo = res.data.cargoListData
                }) 
            }
        },
        mounted(){
            this.getAllCargo()
        },
    }
</script>

<template>
    <div class="mt-12">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    
                    <tr>
                        <th scope="col" class="p-4">
                            <div class="flex items-center">
                                <input id="checkbox-all" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-all" class="sr-only">checkbox</label>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Product names
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Color
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
               
                    <tr v-for="(cargo, index) in data.allCargo" :key="index" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="w-4 p-4">
                            <div class="flex items-center">
                                <input id="checkbox-table-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-table-1" class="sr-only">checkbox</label>
                            </div>
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ cargo.id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ cargo.name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ cargo.slug }}
                        </td>
                        <td class="px-6 py-4">
                            {{ cargo.created_at }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        </td>
                    </tr>
                     
                </tbody>
            </table>
        </div>
    </div>
</template>

<style lang="scss" scoped>

</style>