<script>
  import Toggle from "@vueform/toggle";
  
  import Layout from "../../layouts/main.vue";
  import PageHeader from "@/components/page-header";
  import appConfig from "../../../app.config";
  
  export default {
    page: {
      title: "Advanced",
      meta: [{ name: "description", content: appConfig.description }],
    },
    data() {
      return {
        title: "Form Advanced",
        items: [
          {
            text: "Forms",
            href: "/",
          },
          {
            text: "Form Advanced",
            active: true,
          },
        ],
        value: true,
        value1: true,
        value2: true,
        value3: true,
        value4: true,
        maxlen: "",
        data: "",
        option: "",
        textarea: "",
        defaultNull: null,
        defaultspinval: 1,
        countrylist: [
          {
            id: 1,
            flagImg: require("@/assets/images/flags/ac.svg"),
            countryName: "Ascension Island",
            countryCode: "+247"
          },
          {
            id: 2,
            flagImg: require("@/assets/images/flags/ad.svg"),
            countryName: "Andorra",
            countryCode: "+376"
          },
          {
            id: 3,
            flagImg: require("@/assets/images/flags/ae.svg"),
            countryName: "United Arab Emirates",
            countryCode: "+971"
          },
          {
            id: 4,
            flagImg: require("@/assets/images/flags/af.svg"),
            countryName: "Afghanistan",
            countryCode: "+93"
          },
          {
            id: 5,
            flagImg: require("@/assets/images/flags/ag.svg"),
            countryName: "Antigua and Barbuda",
            countryCode: "+93"
          },
          {
            id: 6,
            flagImg: require("@/assets/images/flags/ai.svg"),
            countryName: "Anguilla",
            countryCode: "+1"
          },
          {
            id: 7,
            flagImg: require("@/assets/images/flags/am.svg"),
            countryName: "Armenia",
            countryCode: "+374"
          },
          {
            id: 8,
            flagImg: require("@/assets/images/flags/ao.svg"),
            countryName: "Angola",
            countryCode: "+244"
          },
          {
            id: 9,
            flagImg: require("@/assets/images/flags/aq.svg"),
            countryName: "Antarctica",
            countryCode: "+672"
          },
          {
            id: 10,
            flagImg: require("@/assets/images/flags/ar.svg"),
            countryName: "Argentina",
            countryCode: "+54"
          },
          {
            id: 11,
            flagImg: require("@/assets/images/flags/as.svg"),
            countryName: "American Samoa",
            countryCode: "+1"
          },
          {
            id: 12,
            flagImg: require("@/assets/images/flags/at.svg"),
            countryName: "Austria",
            countryCode: "+43"
          },
          {
            id: 13,
            flagImg: require("@/assets/images/flags/au.svg"),
            countryName: "Australia",
            countryCode: "+61"
          },
          {
            id: 14,
            flagImg: require("@/assets/images/flags/aw.svg"),
            countryName: "Aruba",
            countryCode: "+297"
          },
          {
            id: 15,
            flagImg: require("@/assets/images/flags/ax.svg"),
            countryName: "Aland Islands",
            countryCode: "+358"
          },
          {
            id: 16,
            flagImg: require("@/assets/images/flags/ba.svg"),
            countryName: "Bosnia and Herzegovina",
            countryCode: "+387"
          },
          {
            id: 17,
            flagImg: require("@/assets/images/flags/bb.svg"),
            countryName: "Barbados",
            countryCode: "+1"
          },
          {
            id: 18,
            flagImg: require("@/assets/images/flags/bd.svg"),
            countryName: "Bangladesh",
            countryCode: "+880"
          },
          {
            id: 19,
            flagImg: require("@/assets/images/flags/be.svg"),
            countryName: "Belgium",
            countryCode: "+32"
          },
          {
            id: 20,
            flagImg: require("@/assets/images/flags/bf.svg"),
            countryName: "Burkina Faso",
            countryCode: "+226"
          },
          {
            id: 21,
            flagImg: require("@/assets/images/flags/bf.svg"),
            countryName: "Bulgaria",
            countryCode: "+359"
          },
          {
            id: 22,
            flagImg: require("@/assets/images/flags/bh.svg"),
            countryName: "Bahrain",
            countryCode: "+973"
          },
          {
            id: 23,
            flagImg: require("@/assets/images/flags/bi.svg"),
            countryName: "Burundi",
            countryCode: "+257"
          },
          {
            id: 24,
            flagImg: require("@/assets/images/flags/bj.svg"),
            countryName: "Benin",
            countryCode: "+229"
          },
          {
            id: 25,
            flagImg: require("@/assets/images/flags/bl.svg"),
            countryName: "Saint Barthélemy",
            countryCode: "+590"
          },
          {
            id: 26,
            flagImg: require("@/assets/images/flags/bm.svg"),
            countryName: "Bermuda",
            countryCode: "+1"
          },
          {
            id: 27,
            flagImg: require("@/assets/images/flags/bn.svg"),
            countryName: "Brunei Darussalam",
            countryCode: "+673"
          },
          {
            id: 28,
            flagImg: require("@/assets/images/flags/bo.svg"),
            countryName: "Bolivia (Plurinational State of)",
            countryCode: "+591"
          },
          {
            id: 29,
            flagImg: require("@/assets/images/flags/bq.svg"),
            countryName: "Bonaire, Sint Eustatius and Saba",
            countryCode: "+599"
          },
          {
            id: 30,
            flagImg: require("@/assets/images/flags/br.svg"),
            countryName: "Brazil",
            countryCode: "+55"
          },
          {
            id: 31,
            flagImg: require("@/assets/images/flags/bs.svg"),
            countryName: "Bahamas",
            countryCode: "+1"
          },
          {
            id: 32,
            flagImg: require("@/assets/images/flags/bt.svg"),
            countryName: "Bhutan",
            countryCode: "+975"
          },
          {
            id: 33,
            flagImg: require("@/assets/images/flags/bv.svg"),
            countryName: "Bouvet Island",
            countryCode: "+47"
          },
          {
            id: 34,
            flagImg: require("@/assets/images/flags/bw.svg"),
            countryName: "Botswana",
            countryCode: "+267"
          },
          {
            id: 35,
            flagImg: require("@/assets/images/flags/by.svg"),
            countryName: "Belarus",
            countryCode: "+375"
          },
          {
            id: 36,
            flagImg: require("@/assets/images/flags/bz.svg"),
            countryName: "Belize",
            countryCode: "+501"
          },
          {
            id: 37,
            flagImg: require("@/assets/images/flags/ca.svg"),
            countryName: "Canada",
            countryCode: "+1"
          },
          {
            id: 38,
            flagImg: require("@/assets/images/flags/cc.svg"),
            countryName: "Cocos (Keeling) Island",
            countryCode: "+61"
          },
          {
            id: 39,
            flagImg: require("@/assets/images/flags/cd.svg"),
            countryName: "Democratic Republic of the Congo",
            countryCode: "+243"
          },
          {
            id: 40,
            flagImg: require("@/assets/images/flags/cf.svg"),
            countryName: "Central African Republic",
            countryCode: "+236"
          },
          {
            id: 41,
            flagImg: require("@/assets/images/flags/cg.svg"),
            countryName: "Republic of the Congo",
            countryCode: "+243"
          },
          {
            id: 42,
            flagImg: require("@/assets/images/flags/ch.svg"),
            countryName: "Switzerland",
            countryCode: "+41"
          },
          {
            id: 43,
            flagImg: require("@/assets/images/flags/ci.svg"),
            countryName: "Ivory Coast",
            countryCode: "+225"
          },
          {
            id: 44,
            flagImg: require("@/assets/images/flags/ck.svg"),
            countryName: "Cook Islands",
            countryCode: "+682"
          },
          {
            id: 45,
            flagImg: require("@/assets/images/flags/cl.svg"),
            countryName: "Chile",
            countryCode: "+56"
          },
          {
            id: 46,
            flagImg: require("@/assets/images/flags/cm.svg"),
            countryName: "Cameroon",
            countryCode: "+237"
          },
          {
            id: 47,
            flagImg: require("@/assets/images/flags/cn.svg"),
            countryName: "China",
            countryCode: "+86"
          },
          {
            id: 48,
            flagImg: require("@/assets/images/flags/co.svg"),
            countryName: "Colombia",
            countryCode: "+57"
          },
          {
            id: 49,
            flagImg: require("@/assets/images/flags/cp.svg"),
            countryName: "Clipperton Island",
            countryCode: "+55"
          },
          {
            id: 50,
            flagImg: require("@/assets/images/flags/cr.svg"),
            countryName: "Costa Rica",
            countryCode: "+506"
          },
          {
            id: 51,
            flagImg: require("@/assets/images/flags/cu.svg"),
            countryName: "Cuba",
            countryCode: "+53"
          },
          {
            id: 52,
            flagImg: require("@/assets/images/flags/cv.svg"),
            countryName: "Cabo Verde",
            countryCode: "+238"
          },
          {
            id: 53,
            flagImg: require("@/assets/images/flags/cw.svg"),
            countryName: "Curaçao",
            countryCode: "+599"
          },
          {
            id: 54,
            flagImg: require("@/assets/images/flags/cx.svg"),
            countryName: "Christmas Island",
            countryCode: "+61"
          },
          {
            id: 55,
            flagImg: require("@/assets/images/flags/cy.svg"),
            countryName: "Cyprus",
            countryCode: "+357"
          },
          {
            id: 56,
            flagImg: require("@/assets/images/flags/cz.svg"),
            countryName: "Czech Republic",
            countryCode: "+420"
          },
          {
            id: 57,
            flagImg: require("@/assets/images/flags/de.svg"),
            countryName: "Germany",
            countryCode: "+49"
          },
          {
            id: 58,
            flagImg: require("@/assets/images/flags/dg.svg"),
            countryName: "Diego Garcia",
            countryCode: "+246"
          },
          {
            id: 59,
            flagImg: require("@/assets/images/flags/dj.svg"),
            countryName: "Djibouti",
            countryCode: "+253"
          },
          {
            id: 60,
            flagImg: require("@/assets/images/flags/dk.svg"),
            countryName: "Denmark",
            countryCode: "+45"
          },
          {
            id: 61,
            flagImg: require("@/assets/images/flags/dm.svg"),
            countryName: "Dominica",
            countryCode: "+1"
          },
          {
            id: 62,
            flagImg: require("@/assets/images/flags/do.svg"),
            countryName: "Dominican Republic",
            countryCode: "+1"
          },
          {
            id: 63,
            flagImg: require("@/assets/images/flags/dz.svg"),
            countryName: "Algeria",
            countryCode: "+213"
          },
          {
            id: 64,
            flagImg: require("@/assets/images/flags/ea.svg"),
            countryName: "Ceuta & Melilla",
            countryCode: "34"
          },
          {
            id: 65,
            flagImg: require("@/assets/images/flags/ec.svg"),
            countryName: "Ecuador",
            countryCode: "+593"
          },
          {
            id: 66,
            flagImg: require("@/assets/images/flags/ee.svg"),
            countryName: "Estonia",
            countryCode: "+372"
          },
          {
            id: 67,
            flagImg: require("@/assets/images/flags/eg.svg"),
            countryName: "Egypt",
            countryCode: "+20"
          },
          {
            id: 68,
            flagImg: require("@/assets/images/flags/eh.svg"),
            countryName: "Western Sahara",
            countryCode: "+212"
          },
          {
            id: 69,
            flagImg: require("@/assets/images/flags/er.svg"),
            countryName: "Eritrea",
            countryCode: "+291"
          },
          {
            id: 70,
            flagImg: require("@/assets/images/flags/es.svg"),
            countryName: "Spain",
            countryCode: "+34"
          },
          {
            id: 71,
            flagImg: require("@/assets/images/flags/es-ct.svg"),
            countryName: "Catalonia",
            countryCode: "+34"
          },
          {
            id: 72,
            flagImg: require("@/assets/images/flags/es-ga.svg"),
            countryName: "Galicia",
            countryCode: "+34"
          },
          {
            id: 73,
            flagImg: require("@/assets/images/flags/et.svg"),
            countryName: "Ethiopia",
            countryCode: "+251"
          },
          {
            id: 74,
            flagImg: require("@/assets/images/flags/eu.svg"),
            countryName: "Europe",
            countryCode: "+3"
          },
          {
            id: 75,
            flagImg: require("@/assets/images/flags/fi.svg"),
            countryName: "Finland",
            countryCode: "+358"
          },
          {
            id: 76,
            flagImg: require("@/assets/images/flags/fj.svg"),
            countryName: "Fiji",
            countryCode: "+679"
          },
          {
            id: 77,
            flagImg: require("@/assets/images/flags/fk.svg"),
            countryName: "Falkland Islands",
            countryCode: "+500"
          },
          {
            id: 78,
            flagImg: require("@/assets/images/flags/fm.svg"),
            countryName: "Federated States of Micronesia",
            countryCode: "+691"
          },
          {
            id: 79,
            flagImg: require("@/assets/images/flags/fo.svg"),
            countryName: "Faroe Islands",
            countryCode: "+298"
          },
          {
            id: 80,
            flagImg: require("@/assets/images/flags/fr.svg"),
            countryName: "France",
            countryCode: "+33"
          },
          {
            id: 81,
            flagImg: require("@/assets/images/flags/ga.svg"),
            countryName: "Gabon",
            countryCode: "+241"
          },
          {
            id: 82,
            flagImg: require("@/assets/images/flags/gb-eng.svg"),
            countryName: "England",
            countryCode: "+44"
          },
          {
            id: 83,
            flagImg: require("@/assets/images/flags/gb-nir.svg"),
            countryName: "Northern Ireland",
            countryCode: "+44"
          },
          {
            id: 84,
            flagImg: require("@/assets/images/flags/gb-sct.svg"),
            countryName: "Scotland",
            countryCode: "+44"
          },
          {
            id: 85,
            flagImg: require("@/assets/images/flags/gb-wls.svg"),
            countryName: "Wales",
            countryCode: "+44"
          },
          {
            id: 86,
            flagImg: require("@/assets/images/flags/gd.svg"),
            countryName: "Grenada",
            countryCode: "+1"
          },
          {
            id: 87,
            flagImg: require("@/assets/images/flags/ge.svg"),
            countryName: "Georgia",
            countryCode: "+995"
          },
          {
            id: 88,
            flagImg: require("@/assets/images/flags/gf.svg"),
            countryName: "French Guiana",
            countryCode: "+594"
          },
          {
            id: 99,
            flagImg: require("@/assets/images/flags/gg.svg"),
            countryName: "Guernsey",
            countryCode: "+44"
          },
          {
            id: 90,
            flagImg: require("@/assets/images/flags/gh.svg"),
            countryName: "Ghana",
            countryCode: "+233"
          },
          {
            id: 91,
            flagImg: require("@/assets/images/flags/gi.svg"),
            countryName: "Gibraltar",
            countryCode: "+350"
          },
          {
            id: 92,
            flagImg: require("@/assets/images/flags/gl.svg"),
            countryName: "Greenland",
            countryCode: "+299"
          },
          {
            id: 93,
            flagImg: require("@/assets/images/flags/gm.svg"),
            countryName: "Gambia",
            countryCode: "+220"
          },
          {
            id: 94,
            flagImg: require("@/assets/images/flags/gn.svg"),
            countryName: "Guinea",
            countryCode: "+224"
          },
          {
            id: 95,
            flagImg: require("@/assets/images/flags/gp.svg"),
            countryName: "Guadeloupe",
            countryCode: "+590"
          },
          {
            id: 96,
            flagImg: require("@/assets/images/flags/gq.svg"),
            countryName: "Equatorial Guinea",
            countryCode: "+240"
          },
          {
            id: 97,
            flagImg: require("@/assets/images/flags/gr.svg"),
            countryName: "Greece",
            countryCode: "+30"
          },
          {
            id: 98,
            flagImg: require("@/assets/images/flags/gs.svg"),
            countryName: "South Georgia and the South Sandwich Islands",
            countryCode: "+500"
          },
          {
            id: 99,
            flagImg: require("@/assets/images/flags/gt.svg"),
            countryName: "Guatemala",
            countryCode: "+502"
          },
          {
            id: 100,
            flagImg: require("@/assets/images/flags/gu.svg"),
            countryName: "Guam",
            countryCode: "+1"
          },
          {
            id: 101,
            flagImg: require("@/assets/images/flags/gw.svg"),
            countryName: "Guinea-Bissau",
            countryCode: "+245"
          },
          {
            id: 102,
            flagImg: require("@/assets/images/flags/gy.svg"),
            countryName: "Guyana",
            countryCode: "+592"
          },
          {
            id: 103,
            flagImg: require("@/assets/images/flags/hk.svg"),
            countryName: "Hong Kong",
            countryCode: "+852"
          },
          {
            id: 104,
            flagImg: require("@/assets/images/flags/hn.svg"),
            countryName: "Honduras",
            countryCode: "+504"
          },
          {
            id: 105,
            flagImg: require("@/assets/images/flags/hr.svg"),
            countryName: "Croatia",
            countryCode: "+385"
          },
          {
            id: 106,
            flagImg: require("@/assets/images/flags/ht.svg"),
            countryName: "Haiti",
            countryCode: "+509"
          },
          {
            id: 107,
            flagImg: require("@/assets/images/flags/hu.svg"),
            countryName: "Hungary",
            countryCode: "+36"
          },
          {
            id: 108,
            flagImg: require("@/assets/images/flags/id.svg"),
            countryName: "Indonesia",
            countryCode: "+62"
          },
          {
            id: 109,
            flagImg: require("@/assets/images/flags/ie.svg"),
            countryName: "Ireland",
            countryCode: "+353"
          },
          {
            id: 110,
            flagImg: require("@/assets/images/flags/il.svg"),
            countryName: "Israel",
            countryCode: "+972"
          },
          {
            id: 111,
            flagImg: require("@/assets/images/flags/im.svg"),
            countryName: "Isle of Man",
            countryCode: "+44"
          },
          {
            id: 112,
            flagImg: require("@/assets/images/flags/in.svg"),
            countryName: "India",
            countryCode: "+91"
          },
          {
            id: 113,
            flagImg: require("@/assets/images/flags/io.svg"),
            countryName: "British Indian Ocean Territory",
            countryCode: "+246"
          },
          {
            id: 114,
            flagImg: require("@/assets/images/flags/iq.svg"),
            countryName: "Iraq",
            countryCode: "+964"
          },
          {
            id: 115,
            flagImg: require("@/assets/images/flags/ir.svg"),
            countryName: "Iran (Islamic Republic of)",
            countryCode: "+98"
          },
          {
            id: 116,
            flagImg: require("@/assets/images/flags/is.svg"),
            countryName: "Iceland",
            countryCode: "+354"
          },
          {
            id: 117,
            flagImg: require("@/assets/images/flags/it.svg"),
            countryName: "Italy",
            countryCode: "+39"
          },
          {
            id: 118,
            flagImg: require("@/assets/images/flags/je.svg"),
            countryName: "Jersey",
            countryCode: "+44"
          },
          {
            id: 119,
            flagImg: require("@/assets/images/flags/jm.svg"),
            countryName: "Jamaica",
            countryCode: "+1"
          },
          {
            id: 120,
            flagImg: require("@/assets/images/flags/jo.svg"),
            countryName: "Jordan",
            countryCode: "+962"
          },
          {
            id: 121,
            flagImg: require("@/assets/images/flags/jp.svg"),
            countryName: "Japan",
            countryCode: "+81"
          },
          {
            id: 122,
            flagImg: require("@/assets/images/flags/ke.svg"),
            countryName: "Kenya",
            countryCode: "+254"
          },
          {
            id: 123,
            flagImg: require("@/assets/images/flags/kg.svg"),
            countryName: "Kyrgyzstan",
            countryCode: "+996"
          },
          {
            id: 124,
            flagImg: require("@/assets/images/flags/kh.svg"),
            countryName: "Cambodia",
            countryCode: "+855"
          },
          {
            id: 125,
            flagImg: require("@/assets/images/flags/ki.svg"),
            countryName: "Kiribati",
            countryCode: "+686"
          },
          {
            id: 126,
            flagImg: require("@/assets/images/flags/km.svg"),
            countryName: "Comoros",
            countryCode: "+269"
          },
          {
            id: 127,
            flagImg: require("@/assets/images/flags/kn.svg"),
            countryName: "Saint Kitts and Nevis",
            countryCode: "+1"
          },
          {
            id: 128,
            flagImg: require("@/assets/images/flags/kp.svg"),
            countryName: "North Korea",
            countryCode: "+850"
          },
          {
            id: 129,
            flagImg: require("@/assets/images/flags/kr.svg"),
            countryName: "South Korea",
            countryCode: "+82"
          },
          {
            id: 130,
            flagImg: require("@/assets/images/flags/kw.svg"),
            countryName: "Kuwait",
            countryCode: "+965"
          },
          {
            id: 131,
            flagImg: require("@/assets/images/flags/ky.svg"),
            countryName: "Cayman Islands",
            countryCode: "+1"
          },
          {
            id: 132,
            flagImg: require("@/assets/images/flags/kz.svg"),
            countryName: "Kazakhstan",
            countryCode: "+7"
          },
          {
            id: 133,
            flagImg: require("@/assets/images/flags/la.svg"),
            countryName: "Laos",
            countryCode: "+856"
          },
          {
            id: 134,
            flagImg: require("@/assets/images/flags/lb.svg"),
            countryName: "Lebanon",
            countryCode: "+961"
          },
          {
            id: 135,
            flagImg: require("@/assets/images/flags/lc.svg"),
            countryName: "Saint Lucia",
            countryCode: "+1"
          },
          {
            id: 136,
            flagImg: require("@/assets/images/flags/li.svg"),
            countryName: "Liechtenstein",
            countryCode: "+423"
          },
          {
            id: 137,
            flagImg: require("@/assets/images/flags/lk.svg"),
            countryName: "Sri Lanka",
            countryCode: "+94"
          },
          {
            id: 138,
            flagImg: require("@/assets/images/flags/lr.svg"),
            countryName: "Liberia",
            countryCode: "+231"
          },
          {
            id: 139,
            flagImg: require("@/assets/images/flags/ls.svg"),
            countryName: "Lesotho",
            countryCode: "+266"
          },
          {
            id: 140,
            flagImg: require("@/assets/images/flags/lt.svg"),
            countryName: "Lithuania",
            countryCode: "+370"
          },
          {
            id: 141,
            flagImg: require("@/assets/images/flags/lu.svg"),
            countryName: "Luxembourg",
            countryCode: "+352"
          },
          {
            id: 142,
            flagImg: require("@/assets/images/flags/lv.svg"),
            countryName: "Latvia",
            countryCode: "+371"
          },
          {
            id: 143,
            flagImg: require("@/assets/images/flags/ly.svg"),
            countryName: "Libya",
            countryCode: "+218"
          },
          {
            id: 144,
            flagImg: require("@/assets/images/flags/ma.svg"),
            countryName: "Morocco",
            countryCode: "+212"
          },
          {
            id: 145,
            flagImg: require("@/assets/images/flags/mc.svg"),
            countryName: "Monaco",
            countryCode: "+377"
          },
          {
            id: 146,
            flagImg: require("@/assets/images/flags/md.svg"),
            countryName: "Moldova",
            countryCode: "+373"
          },
          {
            id: 147,
            flagImg: require("@/assets/images/flags/me.svg"),
            countryName: "Montenegro",
            countryCode: "+382"
          },
          {
            id: 148,
            flagImg: require("@/assets/images/flags/mf.svg"),
            countryName: "Saint Martin",
            countryCode: "+721"
          },
          {
            id: 149,
            flagImg: require("@/assets/images/flags/mg.svg"),
            countryName: "Madagascar",
            countryCode: "+261"
          },
          {
            id: 150,
            flagImg: require("@/assets/images/flags/mh.svg"),
            countryName: "Marshall Islands",
            countryCode: "+692"
          },
          {
            id: 151,
            flagImg: require("@/assets/images/flags/mk.svg"),
            countryName: "North Macedonia",
            countryCode: "+389"
          },
          {
            id: 152,
            flagImg: require("@/assets/images/flags/ml.svg"),
            countryName: "Mali",
            countryCode: "+223"
          },
          {
            id: 153,
            flagImg: require("@/assets/images/flags/mm.svg"),
            countryName: "Myanmar",
            countryCode: "+95"
          },
          {
            id: 154,
            flagImg: require("@/assets/images/flags/mn.svg"),
            countryName: "Mongolia",
            countryCode: "+976"
          },
          {
            id: 155,
            flagImg: require("@/assets/images/flags/mo.svg"),
            countryName: "Macau",
            countryCode: "+853"
          },
          {
            id: 156,
            flagImg: require("@/assets/images/flags/mp.svg"),
            countryName: "Northern Mariana Islands",
            countryCode: "+1"
          },
          {
            id: 157,
            flagImg: require("@/assets/images/flags/mq.svg"),
            countryName: "Martinique",
            countryCode: "+596"
          },
          {
            id: 158,
            flagImg: require("@/assets/images/flags/mr.svg"),
            countryName: "Mauritania",
            countryCode: "+222"
          },
          {
            id: 159,
            flagImg: require("@/assets/images/flags/ms.svg"),
            countryName: "Montserrat",
            countryCode: "+1"
          },
          {
            id: 160,
            flagImg: require("@/assets/images/flags/mt.svg"),
            countryName: "Malta",
            countryCode: "+356"
          },
          {
            id: 161,
            flagImg: require("@/assets/images/flags/mu.svg"),
            countryName: "Mauritius",
            countryCode: "+230"
          },
          {
            id: 162,
            flagImg: require("@/assets/images/flags/mv.svg"),
            countryName: "Maldives",
            countryCode: "+960"
          },
          {
            id: 163,
            flagImg: require("@/assets/images/flags/mw.svg"),
            countryName: "Malawi",
            countryCode: "+265"
          },
          {
            id: 164,
            flagImg: require("@/assets/images/flags/mx.svg"),
            countryName: "Mexico",
            countryCode: "+52"
          },
          {
            id: 165,
            flagImg: require("@/assets/images/flags/my.svg"),
            countryName: "Malaysia",
            countryCode: "+60"
          },
          {
            id: 166,
            flagImg: require("@/assets/images/flags/mz.svg"),
            countryName: "Mozambique",
            countryCode: "+258"
          },
          {
            id: 167,
            flagImg: require("@/assets/images/flags/na.svg"),
            countryName: "Namibia",
            countryCode: "+264"
          },
          {
            id: 168,
            flagImg: require("@/assets/images/flags/nc.svg"),
            countryName: "New Caledonia",
            countryCode: "+687"
          },
          {
            id: 169,
            flagImg: require("@/assets/images/flags/ne.svg"),
            countryName: "Niger",
            countryCode: "+227"
          },
          {
            id: 170,
            flagImg: require("@/assets/images/flags/nf.svg"),
            countryName: "Norfolk Island",
            countryCode: "+672"
          },
          {
            id: 171,
            flagImg: require("@/assets/images/flags/ng.svg"),
            countryName: "Nigeria",
            countryCode: "+234"
          },
          {
            id: 172,
            flagImg: require("@/assets/images/flags/ni.svg"),
            countryName: "Nicaragua",
            countryCode: "+505"
          },
          {
            id: 173,
            flagImg: require("@/assets/images/flags/nl.svg"),
            countryName: "Netherlands",
            countryCode: "+31"
          },
          {
            id: 174,
            flagImg: require("@/assets/images/flags/no.svg"),
            countryName: "Norway",
            countryCode: "+47"
          },
          {
            id: 175,
            flagImg: require("@/assets/images/flags/np.svg"),
            countryName: "Nepal",
            countryCode: "+977"
          },
          {
            id: 176,
            flagImg: require("@/assets/images/flags/nr.svg"),
            countryName: "Nauru",
            countryCode: "+674"
          },
          {
            id: 177,
            flagImg: require("@/assets/images/flags/nu.svg"),
            countryName: "Niue",
            countryCode: "+683"
          },
          {
            id: 178,
            flagImg: require("@/assets/images/flags/nz.svg"),
            countryName: "New Zealand",
            countryCode: "+64"
          },
          {
            id: 179,
            flagImg: require("@/assets/images/flags/om.svg"),
            countryName: "Oman",
            countryCode: "+968"
          },
          {
            id: 180,
            flagImg: require("@/assets/images/flags/pa.svg"),
            countryName: "Panama",
            countryCode: "+507"
          },
          {
            id: 181,
            flagImg: require("@/assets/images/flags/pe.svg"),
            countryName: "Peru",
            countryCode: "+51"
          },
          {
            id: 182,
            flagImg: require("@/assets/images/flags/pf.svg"),
            countryName: "French Polynesia",
            countryCode: "+689"
          },
          {
            id: 183,
            flagImg: require("@/assets/images/flags/pg.svg"),
            countryName: "Papua New Guinea",
            countryCode: "+675"
          },
          {
            id: 184,
            flagImg: require("@/assets/images/flags/ph.svg"),
            countryName: "Philippines",
            countryCode: "+63"
          },
          {
            id: 185,
            flagImg: require("@/assets/images/flags/pk.svg"),
            countryName: "Pakistan",
            countryCode: "+92"
          },
          {
            id: 186,
            flagImg: require("@/assets/images/flags/pl.svg"),
            countryName: "Poland",
            countryCode: "+48"
          },
          {
            id: 187,
            flagImg: require("@/assets/images/flags/pm.svg"),
            countryName: "Saint Pierre and Miquelon",
            countryCode: "+508"
          },
          {
            id: 188,
            flagImg: require("@/assets/images/flags/pn.svg"),
            countryName: "Pitcairn",
            countryCode: "+64"
          },
          {
            id: 189,
            flagImg: require("@/assets/images/flags/pr.svg"),
            countryName: "Puerto Rico",
            countryCode: "+1"
          },
          {
            id: 190,
            flagImg: require("@/assets/images/flags/ps.svg"),
            countryName: "State of Palestine",
            countryCode: "+970"
          },
          {
            id: 191,
            flagImg: require("@/assets/images/flags/pt.svg"),
            countryName: "Portugal",
            countryCode: "+351"
          },
          {
            id: 192,
            flagImg: require("@/assets/images/flags/pw.svg"),
            countryName: "Palau",
            countryCode: "+680"
          },
          {
            id: 193,
            flagImg: require("@/assets/images/flags/py.svg"),
            countryName: "Paraguay",
            countryCode: "+595"
          },
          {
            id: 194,
            flagImg: require("@/assets/images/flags/qa.svg"),
            countryName: "Qatar",
            countryCode: "+974"
          },
          {
            id: 195,
            flagImg: require("@/assets/images/flags/re.svg"),
            countryName: "Réunion",
            countryCode: "+262"
          },
          {
            id: 196,
            flagImg: require("@/assets/images/flags/ro.svg"),
            countryName: "Romania",
            countryCode: "+40"
          },
          {
            id: 197,
            flagImg: require("@/assets/images/flags/rs.svg"),
            countryName: "Serbia",
            countryCode: "+381"
          },
          {
            id: 198,
            flagImg: require("@/assets/images/flags/ru.svg"),
            countryName: "Russia",
            countryCode: "+7"
          },
          {
            id: 199,
            flagImg: require("@/assets/images/flags/rw.svg"),
            countryName: "Rwanda",
            countryCode: "+250"
          },
          {
            id: 200,
            flagImg: require("@/assets/images/flags/sa.svg"),
            countryName: "Saudi Arabia",
            countryCode: "+966"
          },
          {
            id: 201,
            flagImg: require("@/assets/images/flags/sb.svg"),
            countryName: "Solomon Islands",
            countryCode: "+677"
          },
          {
            id: 202,
            flagImg: require("@/assets/images/flags/sc.svg"),
            countryName: "Seychelles",
            countryCode: "+248"
          },
          {
            id: 203,
            flagImg: require("@/assets/images/flags/sd.svg"),
            countryName: "Sudan",
            countryCode: "+249"
          },
          {
            id: 204,
            flagImg: require("@/assets/images/flags/se.svg"),
            countryName: "Sweden",
            countryCode: "+46"
          },
          {
            id: 205,
            flagImg: require("@/assets/images/flags/sg.svg"),
            countryName: "Singapore",
            countryCode: "+65"
          },
          {
            id: 207,
            flagImg: require("@/assets/images/flags/si.svg"),
            countryName: "Slovenia",
            countryCode: "+386"
          },
          {
            id: 208,
            flagImg: require("@/assets/images/flags/sj.svg"),
            countryName: "Svalbard and Jan Mayen",
            countryCode: "47"
          },
          {
            id: 209,
            flagImg: require("@/assets/images/flags/sk.svg"),
            countryName: "Slovakia",
            countryCode: "+421"
          },
          {
            id: 210,
            flagImg: require("@/assets/images/flags/sl.svg"),
            countryName: "Sierra Leone",
            countryCode: "+232"
          },
          {
            id: 212,
            flagImg: require("@/assets/images/flags/sm.svg"),
            countryName: "San Marino",
            countryCode: "+378"
          },
          {
            id: 213,
            flagImg: require("@/assets/images/flags/sn.svg"),
            countryName: "Senegal",
            countryCode: "+221"
          },
          {
            id: 214,
            flagImg: require("@/assets/images/flags/so.svg"),
            countryName: "Somalia",
            countryCode: "+252"
          },
          {
            id: 215,
            flagImg: require("@/assets/images/flags/sr.svg"),
            countryName: "Suriname",
            countryCode: "+597"
          },
          {
            id: 216,
            flagImg: require("@/assets/images/flags/ss.svg"),
            countryName: "South Sudan",
            countryCode: "+211"
          },
          {
            id: 217,
            flagImg: require("@/assets/images/flags/st.svg"),
            countryName: "Sao Tome and Principe",
            countryCode: "+239"
          },
          {
            id: 218,
            flagImg: require("@/assets/images/flags/sv.svg"),
            countryName: "El Salvador",
            countryCode: "+503"
          },
          {
            id: 219,
            flagImg: require("@/assets/images/flags/sx.svg"),
            countryName: "Sint Maarten",
            countryCode: "+721"
          },
          {
            id: 220,
            flagImg: require("@/assets/images/flags/sy.svg"),
            countryName: "Syria",
            countryCode: "+963"
          },
          {
            id: 221,
            flagImg: require("@/assets/images/flags/sz.svg"),
            countryName: "Eswatini",
            countryCode: "+268"
          },
          {
            id: 222,
            flagImg: require("@/assets/images/flags/ta.svg"),
            countryName: "Tristan da Cunha",
            countryCode: "+290"
          },
          {
            id: 223,
            flagImg: require("@/assets/images/flags/tc.svg"),
            countryName: "Turks and Caicos Islands",
            countryCode: "+1"
          },
          {
            id: 224,
            flagImg: require("@/assets/images/flags/td.svg"),
            countryName: "Chad",
            countryCode: "+235"
          },
          {
            id: 225,
            flagImg: require("@/assets/images/flags/tg.svg"),
            countryName: "Togo",
            countryCode: "+228"
          },
          {
            id: 226,
            flagImg: require("@/assets/images/flags/th.svg"),
            countryName: "Thailand",
            countryCode: "+66"
          },
          {
            id: 227,
            flagImg: require("@/assets/images/flags/tj.svg"),
            countryName: "Tajikistan",
            countryCode: "+992"
          },
          {
            id: 228,
            flagImg: require("@/assets/images/flags/tk.svg"),
            countryName: "Tokelau",
            countryCode: "+690"
          },
          {
            id: 229,
            flagImg: require("@/assets/images/flags/tl.svg"),
            countryName: "Timor-Leste",
            countryCode: "+670"
          },
          {
            id: 230,
            flagImg: require("@/assets/images/flags/tm.svg"),
            countryName: "Turkmenistan",
            countryCode: "+993"
          },
          {
            id: 231,
            flagImg: require("@/assets/images/flags/tn.svg"),
            countryName: "Tunisia",
            countryCode: "+216"
          },
          {
            id: 232,
            flagImg: require("@/assets/images/flags/to.svg"),
            countryName: "Tonga",
            countryCode: "+676"
          },
          {
            id: 233,
            flagImg: require("@/assets/images/flags/tr.svg"),
            countryName: "Turkey",
            countryCode: "+90"
          },
          {
            id: 234,
            flagImg: require("@/assets/images/flags/tt.svg"),
            countryName: "Trinidad and Tobago",
            countryCode: "+1"
          },
          {
            id: 235,
            flagImg: require("@/assets/images/flags/tv.svg"),
            countryName: "Tuvalu",
            countryCode: "+688"
          },
          {
            id: 236,
            flagImg: require("@/assets/images/flags/tw.svg"),
            countryName: "Taiwan",
            countryCode: "+886"
          },
          {
            id: 237,
            flagImg: require("@/assets/images/flags/tz.svg"),
            countryName: "Tanzania",
            countryCode: "+255"
          },
          {
            id: 238,
            flagImg: require("@/assets/images/flags/ua.svg"),
            countryName: "Ukraine",
            countryCode: "+380"
          },
          {
            id: 239,
            flagImg: require("@/assets/images/flags/ug.svg"),
            countryName: "Uganda",
            countryCode: "+256"
          },
          {
            id: 240,
            flagImg: require("@/assets/images/flags/us.svg"),
            countryName: "United States of America",
            countryCode: "+1"
          },
          {
            id: 242,
            flagImg: require("@/assets/images/flags/uy.svg"),
            countryName: "Uruguay",
            countryCode: "+598"
          },
          {
            id: 243,
            flagImg: require("@/assets/images/flags/uz.svg"),
            countryName: "Uzbekistan",
            countryCode: "+998"
          },
          {
            id: 244,
            flagImg: require("@/assets/images/flags/va.svg"),
            countryName: "Holy See",
            countryCode: "+379"
          },
          {
            id: 245,
            flagImg: require("@/assets/images/flags/vc.svg"),
            countryName: "Saint Vincent and the Grenadines",
            countryCode: "+1"
          },
          {
            id: 246,
            flagImg: require("@/assets/images/flags/ve.svg"),
            countryName: "Venezuela (Bolivarian Republic of)",
            countryCode: "+58"
          },
          {
            id: 247,
            flagImg: require("@/assets/images/flags/vg.svg"),
            countryName: "Virgin Islands (British)",
            countryCode: "+1"
          },
          {
            id: 248,
            flagImg: require("@/assets/images/flags/vi.svg"),
            countryName: "Virgin Islands (U.S.)",
            countryCode: "+1"
          },
          {
            id: 249,
            flagImg: require("@/assets/images/flags/vn.svg"),
            countryName: "Vietnam",
            countryCode: "+84"
          },
          {
            id: 250,
            flagImg: require("@/assets/images/flags/vu.svg"),
            countryName: "Vanuatu",
            countryCode: "+678"
          },
          {
            id: 251,
            flagImg: require("@/assets/images/flags/wf.svg"),
            countryName: "Wallis and Futuna",
            countryCode: "+681"
          },
          {
            id: 252,
            flagImg: require("@/assets/images/flags/ws.svg"),
            countryName: "Samoa",
            countryCode: "+685"
          },
          {
            id: 253,
            flagImg: require("@/assets/images/flags/xk.svg"),
            countryName: "Kosovo",
            countryCode: "+383"
          },
          {
            id: 254,
            flagImg: require("@/assets/images/flags/ye.svg"),
            countryName: "Yemen",
            countryCode: "+967"
          },
          {
            id: 255,
            flagImg: require("@/assets/images/flags/yt.svg"),
            countryName: "Mayotte",
            countryCode: "+262"
          },
          {
            id: 256,
            flagImg: require("@/assets/images/flags/za.svg"),
            countryName: "South Africa",
            countryCode: "+27"
          },
          {
            id: 257,
            flagImg: require("@/assets/images/flags/zm.svg"),
            countryName: "Zambia",
            countryCode: "+260"
          },
          {
            id: 258,
            flagImg: require("@/assets/images/flags/zw.svg"),
            countryName: "Zimbabwe",
            countryCode: "+263"
          }
        ]
      };
    },
    components: {
      Toggle,
      Layout,
      PageHeader,
    },
    mounted() {
      setTimeout(() => {
        this.isData();
      }, 100);
      function loadCountryListData(datas) {
          var mainArray = Array.from(document.querySelectorAll("[data-input-flag]"))
          var flags = ''
          var arr = Array.from(datas)
          for (let index = 0; index < arr.length; index++) {
            flags += '<li class="dropdown-item d-flex">\
              <div class="flex-shrink-0 me-2"><img src="'+ arr[index]['flagImg'] + '" alt="country flag" class="options-flagimg" height="20"></div>\
                  <div class="flex-grow-1">\
                  <div class="d-flex"><div class="country-name me-1">'+ arr[index]['countryName'] + '</div><span class="countrylist-codeno text-muted">' + arr[index]['countryCode'] + '</span></div>\
              </div>\
              </li>';
          }
          // console.log(flags,mainArray)
          for (let i = 0; i < mainArray.length; i++) {
                mainArray[i].querySelector(".dropdown-menu-list").innerHTML = ''
              mainArray[i].querySelector(".dropdown-menu-list").innerHTML = flags
              countryListClickEvent(mainArray[i]);
          }
      }
      function countryListClickEvent(item) {
          if (item.querySelector(".country-flagimg")) {
              var countryFlagImg = item.querySelector(".country-flagimg").getAttribute('src');
          }
          Array.from(item.querySelectorAll(".dropdown-menu li")).forEach(function (subitem) {
              var optionFlagImg = subitem.querySelector(".options-flagimg").getAttribute("src");
              subitem.addEventListener("click", function () {
                  var optionCodeNo = subitem.querySelector(".countrylist-codeno").innerHTML;
                  if (item.querySelector("button")) {
                      item.querySelector("button img").setAttribute("src", optionFlagImg);
                      if (item.querySelector("button span")) {
                          item.querySelector("button span").innerHTML = optionCodeNo;
                      }
                  }
              });
              if (countryFlagImg == optionFlagImg) {
                  subitem.classList.add("active");
              }
          });
          // data option flag img with name
          Array.from(document.querySelectorAll("[data-option-flag-img-name]")).forEach(function (item) {
              var flagImg = getComputedStyle(item.querySelector(".flag-input")).backgroundImage;
              var countryFlagImg = flagImg.substring(
                  flagImg.indexOf("/as") + 1,
                  flagImg.lastIndexOf('"')
              );
              Array.from(item.querySelectorAll(".dropdown-menu li")).forEach(function (subitem) {
                  var optionFlagImg = subitem.querySelector(".options-flagimg").getAttribute("src");
                  subitem.addEventListener("click", function () {
                      var optionCountryName = subitem.querySelector(".country-name").innerHTML;
                      item.querySelector(".flag-input").style.backgroundImage = "url(" + optionFlagImg + ")";
                      item.querySelector(".flag-input").value = optionCountryName;
                  });
                  if (countryFlagImg == optionFlagImg) {
                      subitem.classList.add("active");
                      item.querySelector(".flag-input").value = subitem.querySelector(".country-name").innerHTML;
                  }
              });
          });
          // data option flag img with name
          Array.from(document.querySelectorAll("[data-option-flag-name]")).forEach(function (item) {
              var countryName = item.querySelector(".flag-input").value;
              Array.from(item.querySelectorAll(".dropdown-menu li")).forEach(function (subitem) {
                  var optionCountryName = subitem.querySelector(".country-name").innerHTML;
                  subitem.addEventListener("click", function () {
                      item.querySelector(".flag-input").value = optionCountryName;
                  });
                  if (countryName == optionCountryName) {
                      subitem.classList.add("active");
                      item.querySelector(".flag-input").value = subitem.querySelector(".country-name").innerHTML;
                  }
              });
          });
      }
      loadCountryListData(this.countrylist)
      var countryListData = this.countrylist;
      Array.from(document.querySelectorAll("[data-input-flag]")).forEach(function (item) {
          var searchInput = item.querySelector(".search-countryList");
          if (searchInput) {
              searchInput.addEventListener("keyup", function () {
                  var inputVal = searchInput.value.toLowerCase();
                  function filterItems(arr, query) {
                      return arr.filter(function (el) {
                          return (el.countryName.toLowerCase().indexOf(query.toLowerCase()) !== -1 || el.countryCode.indexOf(query) !== -1)
                      })
                  }
                  var filterData = filterItems(countryListData, inputVal);
                  setTimeout(function () {
                      item.querySelector(".dropdown-menu-list").innerHTML = '';
                      Array.from(filterData).forEach(function (listData) {
                          item.querySelector(".dropdown-menu-list").innerHTML +=
                              '<li class="dropdown-item d-flex">\
                          <div class="flex-shrink-0 me-2"><img src="'+ listData.flagImg + '" alt="country flag" class="options-flagimg" height="20"></div>\
                          <div class="flex-grow-1">\
                          <div class="d-flex"><div class="country-name me-1">'+ listData.countryName + '</div><span class="countrylist-codeno text-muted">' + listData.countryCode + '</span></div>\
                          </div>\
                          </li>';
                      });
                      countryListClickEvent(item);
                  }, 350);
              });
          }
      })
    },
    methods: {
      isData() {
        const plus = document.getElementsByClassName("plus");
        const minus = document.getElementsByClassName("minus");
  
        if (plus) {
          Array.prototype.forEach.call(plus, (e) => {
            e.addEventListener("click", (event) => {
              let par = event.target.closest(".input-step");
              par.getElementsByClassName("product-quantity")[0].value++;
            });
          });
        }
  
        if (minus) {
          Array.prototype.forEach.call(minus, (e) => {
            e.addEventListener("click", (event) => {
              let par = event.target.closest(".input-step");
              if (par.getElementsByClassName("product-quantity")[0].value > 0)
                par.getElementsByClassName("product-quantity")[0].value--;
            });
          });
        }
      },
    },
  };
  </script>

<template>
  <Layout>
    <PageHeader :title="title" :items="items" />
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title mb-0">Custom country select input</h4>
          </div>
          <div class="card-body">
            <div class="row g-3">
              <div class="col-lg-6">
                <div>
                  <label class="form-label">Simple select example</label>
                  <div data-input-flag data-option-flag-name>
                    <input type="text" class="form-control rounded-end flag-input" readonly placeholder="Select country"
                      data-bs-toggle="dropdown" aria-expanded="false" />
                    <div class="dropdown-menu w-100">
                      <div class="p-2 px-3 pt-1 searchlist-input">
                        <input type="text" class="form-control form-control-sm border search-countryList"
                          placeholder="Search country name or country code..." />
                      </div>
                      <ul class="list-unstyled dropdown-menu-list mb-0"></ul>
                    </div>
                  </div>
                </div>

                <div class="mt-3">
                  <label class="form-label">Select input flag with img & name</label>
                  <div data-input-flag data-option-flag-img-name>
                    <input type="text" class="form-control rounded-end flag-input" readonly value="United States"
                      placeholder="Select country" data-bs-toggle="dropdown" aria-expanded="false" />
                    <div class="dropdown-menu w-100">
                      <div class="p-2 px-3 pt-1 searchlist-input">
                        <input type="text" class="form-control form-control-sm border search-countryList"
                          placeholder="Search country name or country code..." />
                      </div>
                      <ul class="list-unstyled dropdown-menu-list mb-0"></ul>
                    </div>
                  </div>
                </div>

                <div class="mt-3">
                  <label class="form-label">Search input false in dropdown menu</label>
                  <div data-input-flag data-option-flag-name data-search-input="false">
                    <input type="text" class="form-control rounded-end flag-input" readonly value=""
                      placeholder="Select country" data-bs-toggle="dropdown" aria-expanded="false" />
                    <div class="dropdown-menu w-100">
                      <div class="p-2 px-3 pt-1 searchlist-input">
                        <input type="text" class="form-control form-control-sm border search-countryList"
                          placeholder="Search country name or country code..." />
                      </div>
                      <ul class="list-unstyled dropdown-menu-list mb-0"></ul>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div>
                  <label class="form-label">Select input with buttons & Flag with number</label>
                  <div class="input-group" data-input-flag>
                    <button class="btn btn-light border" type="button" data-bs-toggle="dropdown"
                      aria-expanded="false"><img src="@/assets/images/flags/us.svg" alt="flag img" height="20"
                        class="country-flagimg rounded"><span class="ms-2 country-codeno">+ 1</span></button>
                    <input type="text" class="form-control rounded-end flag-input" value="" placeholder="Enter number"
                      oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                    <div class="dropdown-menu w-100">
                      <div class="p-2 px-3 pt-1 searchlist-input">
                        <input type="text" class="form-control form-control-sm border search-countryList"
                          placeholder="Search country name or country code..." />
                      </div>
                      <ul class="list-unstyled dropdown-menu-list mb-0"></ul>
                    </div>
                  </div>
                </div>
                <div class="mt-3">
                  <label class="form-label">Select input with buttons & Flag</label>
                  <div class="input-group" data-input-flag data-option-countrycode="false">
                    <button class="btn btn-light border" type="button" data-bs-toggle="dropdown"
                      aria-expanded="false"><img src="@/assets/images/flags/us.svg" alt="flag img" height="20"
                        class="country-flagimg rounded"><span class="ms-2 country-codeno">+ 1</span></button>
                    <input type="text" class="form-control rounded-end flag-input" value="" placeholder="Enter number"
                      oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                    <div class="dropdown-menu w-100">
                      <div class="p-2 px-3 pt-1 searchlist-input">
                        <input type="text" class="form-control form-control-sm border search-countryList"
                          placeholder="Search country name or country code..." />
                      </div>
                      <ul class="list-unstyled dropdown-menu-list mb-0"></ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end card body -->
        </div>
        <!-- end card -->
      </div>
      <!-- end col -->
    </div>
    <!-- end row -->
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title mb-0">Form Input Spin</h4>
          </div>
          <!-- end card header -->

          <div class="card-body">
            <div>
              <div class="row gy-4">
                <div class="col-sm-6">
                  <div>
                    <h5 class="fs-13 fw-medium text-muted">Default</h5>

                    <div class="input-step">
                      <button type="button" class="minus shadow">–</button>
                      <input
                        type="number"
                        class="product-quantity"
                        value="2"
                        min="0"
                        max="100"
                        readonly
                      />
                      <button type="button" class="plus shadow">+</button>
                    </div>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div>
                    <h5 class="fs-13 fw-medium text-muted">Light</h5>
                    <div class="input-step light">
                      <button type="button" class="minus shadow">–</button>
                      <input
                        type="number"
                        class="product-quantity"
                        value="5"
                        min="0"
                        max="100"
                        readonly
                      />
                      <button type="button" class="plus shadow">+</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end row -->

              <div class="mt-4 pt-2">
                <div class="row gy-4">
                  <div class="col-sm-6">
                    <div>
                      <h5 class="fs-13 fw-medium text-muted">
                        Default (Full width)
                      </h5>
                      <div class="input-step full-width">
                        <button type="button" class="minus shadow">–</button>
                        <input
                          type="number"
                          class="product-quantity"
                          value="4"
                          min="0"
                          max="100"
                          readonly
                        />
                        <button type="button" class="plus shadow">+</button>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div>
                      <h5 class="fs-13 fw-medium text-muted">
                        Light (Full width)
                      </h5>
                      <div class="input-step full-width light">
                        <button type="button" class="minus shadow">–</button>
                        <input
                          type="number"
                          class="product-quantity"
                          value="6"
                          min="0"
                          max="100"
                          readonly
                        />
                        <button type="button" class="plus shadow">+</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end row -->
              </div>

              <div class="row mt-4 pt-2">
                <h5 class="fs-13 fw-medium text-muted">Colored</h5>
                <div class="d-flex flex-wrap align-items-start gap-2">
                  <div class="input-step step-primary">
                    <button type="button" class="minus shadow">–</button>
                    <input
                      type="number"
                      class="product-quantity"
                      value="6"
                      min="0"
                      max="100"
                      readonly
                    />
                    <button type="button" class="plus shadow">+</button>
                  </div>
                  <div class="input-step step-secondary">
                    <button type="button" class="minus shadow">–</button>
                    <input
                      type="number"
                      class="product-quantity"
                      value="1"
                      min="0"
                      max="100"
                      readonly
                    />
                    <button type="button" class="plus shadow">+</button>
                  </div>
                  <div class="input-step step-success">
                    <button type="button" class="minus shadow">–</button>
                    <input
                      type="number"
                      class="product-quantity"
                      value="3"
                      min="0"
                      max="100"
                      readonly
                    />
                    <button type="button" class="plus shadow">+</button>
                  </div>
                  <div class="input-step step-info">
                    <button type="button" class="minus shadow">–</button>
                    <input
                      type="number"
                      class="product-quantity"
                      value="1"
                      min="0"
                      max="100"
                      readonly
                    />
                    <button type="button" class="plus shadow">+</button>
                  </div>
                  <div class="input-step step-warning">
                    <button type="button" class="minus shadow">–</button>
                    <input
                      type="number"
                      class="product-quantity"
                      value="4"
                      min="0"
                      max="100"
                      readonly
                    />
                    <button type="button" class="plus shadow">+</button>
                  </div>
                  <div class="input-step step-danger">
                    <button type="button" class="minus shadow">–</button>
                    <input
                      type="number"
                      class="product-quantity"
                      value="5"
                      min="0"
                      max="100"
                      readonly
                    />
                    <button type="button" class="plus shadow">+</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end card-body -->
        </div>
        <!-- end card -->
      </div>
      <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Bootstrap MaxLength</h4>

            <label class="mb-1 fw-medium">Default usage</label>
            <p class="text-muted font-13">
              The badge will show up by default when the remaining chars are 10
              or less:
            </p>
            <input
              v-model="maxlen"
              type="text"
              class="form-control"
              :maxlength="10"
            />
            <div v-if="maxlen" class="text-center">
              <p
                class="badge position-absolute"
                :class="{
                  'bg-success': maxlen.length !== 10,
                  'bg-danger': maxlen.length === 10,
                }"
              >
                {{ maxlen.length }} / 10
              </p>
            </div>

            <div>
              <label class="mb-1 mt-3 fw-medium">Threshold value</label>
              <p class="text-muted font-13">
                Do you want the badge to show up when there are 20 chars or
                less? Use the
                <code>threshold</code>
                option:
              </p>
              <input
                v-model="data"
                type="text"
                :maxlength="25"
                class="form-control"
              />
              <div class="text-center">
                <p
                  v-if="data"
                  class="badge position-absolute"
                  :class="{
                    'bg-success': data.length !== 25,
                    'bg-danger': data.length === 25,
                  }"
                >
                  {{ data.length }} / 25
                </p>
              </div>
            </div>

            <div>
              <label class="mb-1 mt-3 fw-medium">All the options</label>
              <p class="text-muted font-13">
                Please note: if the
                <code>alwaysShow</code> option is enabled, the
                <code>threshold</code> option is ignored.
              </p>
              <input
                v-model="option"
                type="text"
                class="form-control"
                :maxlength="25"
              />
              <div class="text-center">
                <p
                  v-if="option"
                  class="badge position-absolute"
                  :class="{
                    'bg-success': option.length !== 25,
                    'bg-danger': option.length === 25,
                  }"
                >
                  You typed
                  {{ option.length }} out of 25 chars available.
                </p>
              </div>
            </div>

            <div>
              <label class="mb-1 mt-3 fw-medium">Textarea</label>
              <p class="text-muted font-13">
                Bootstrap maxlength supports textarea as well as inputs. Even on
                old IE.
              </p>
              <textarea
                v-model="textarea"
                class="form-control"
                :maxlength="225"
                rows="3"
                placeholder="This textarea has a limit of 225 chars."
              ></textarea>
              <div class="text-center">
                <p
                  v-if="textarea"
                  class="badge position-absolute"
                  :class="{
                    'bg-success': textarea.length !== 225,
                    'bg-danger': textarea.length === 225,
                  }"
                >
                  {{ textarea.length }} / 225
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title mb-1">Switch</h4>

            <p class="text-muted font-13">Use <code>@vueform/toggle</code> for below switches.</p>

            <div class="card-body">
              <Toggle v-model="value" class="toggle-red me-2" />
              <Toggle v-model="value1" class="toggle-blue me-2" />
              <Toggle
                v-model="value2"
                class="toggle-primary me-2"
              />
              <Toggle v-model="value3" class="toggle-warning me-2" />
              <Toggle v-model="value4" class="toggle-info" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </Layout>
</template>
