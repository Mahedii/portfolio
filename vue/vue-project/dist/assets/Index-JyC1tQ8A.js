import{_ as d,o as a,c as r,b as t,F as n,r as g,t as s}from"./index-Rclj0A4P.js";const i={data(){return{data:{allCargo:[]}}},methods:{getAllCargo(){this.axios.get("/cargo/list/data").then(o=>{this.data.allCargo=o.data.cargoListData})}},mounted(){this.getAllCargo()}},p={class:"mt-12"},h={class:"relative overflow-x-auto shadow-md sm:rounded-lg"},x={class:"w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"},y=t("thead",{class:"text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"},[t("tr",null,[t("th",{scope:"col",class:"p-4"},[t("div",{class:"flex items-center"},[t("input",{id:"checkbox-all",type:"checkbox",class:"w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"}),t("label",{for:"checkbox-all",class:"sr-only"},"checkbox")])]),t("th",{scope:"col",class:"px-6 py-3"}," Product names "),t("th",{scope:"col",class:"px-6 py-3"}," Color "),t("th",{scope:"col",class:"px-6 py-3"}," Category "),t("th",{scope:"col",class:"px-6 py-3"}," Price "),t("th",{scope:"col",class:"px-6 py-3"}," Action ")])],-1),b=t("td",{class:"w-4 p-4"},[t("div",{class:"flex items-center"},[t("input",{id:"checkbox-table-1",type:"checkbox",class:"w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"}),t("label",{for:"checkbox-table-1",class:"sr-only"},"checkbox")])],-1),u={scope:"row",class:"px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"},f={class:"px-6 py-4"},_={class:"px-6 py-4"},k={class:"px-6 py-4"},m=t("td",{class:"px-6 py-4"},[t("a",{href:"#",class:"font-medium text-blue-600 dark:text-blue-500 hover:underline"},"Edit")],-1);function w(o,v,C,A,c,B){return a(),r("div",p,[t("div",h,[t("table",x,[y,t("tbody",null,[(a(!0),r(n,null,g(c.data.allCargo,(e,l)=>(a(),r("tr",{key:l,class:"bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"},[b,t("th",u,s(e.id),1),t("td",f,s(e.name),1),t("td",_,s(e.slug),1),t("td",k,s(e.created_at),1),m]))),128))])])])])}const D=d(i,[["render",w]]);export{D as default};
