import{k as u,T as _,o as y,f as w,a as t,w as a,b as s,z as x,d as c,u as o,A as g,n as h}from"./app-DHQYfRVv.js";import{D as m,_ as k,a as v}from"./SecondaryButton-CLv16ZDj.js";import{_ as D,a as b,b as C}from"./TextInput-C-R2MJMg.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";const V={class:"space-y-6"},A=s("header",null,[s("h2",{class:"text-lg font-medium text-gray-900 dark:text-gray-100"},"Delete Account"),s("p",{class:"mt-1 text-sm text-gray-600 dark:text-gray-400"}," Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain. ")],-1),B={class:"p-6"},U=s("h2",{class:"text-lg font-medium text-gray-900 dark:text-gray-100"}," Are you sure you want to delete your account? ",-1),$=s("p",{class:"mt-1 text-sm text-gray-600 dark:text-gray-400"}," Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account. ",-1),N={class:"mt-6"},P={class:"mt-6 flex justify-end"},O={__name:"DeleteUserForm",setup(T){const r=u(!1),l=u(null),e=_({password:""}),p=()=>{r.value=!0,x(()=>l.value.focus())},d=()=>{e.delete(route("profile.destroy"),{preserveScroll:!0,onSuccess:()=>n(),onError:()=>l.value.focus(),onFinish:()=>e.reset()})},n=()=>{r.value=!1,e.reset()};return(z,i)=>(y(),w("section",V,[A,t(m,{onClick:p},{default:a(()=>[c("Delete Account")]),_:1}),t(k,{show:r.value,onClose:n},{default:a(()=>[s("div",B,[U,$,s("div",N,[t(D,{for:"password",value:"Password",class:"sr-only"}),t(b,{id:"password",ref_key:"passwordInput",ref:l,modelValue:o(e).password,"onUpdate:modelValue":i[0]||(i[0]=f=>o(e).password=f),type:"password",class:"mt-1 block w-3/4",placeholder:"Password",onKeyup:g(d,["enter"])},null,8,["modelValue"]),t(C,{message:o(e).errors.password,class:"mt-2"},null,8,["message"])]),s("div",P,[t(v,{onClick:n},{default:a(()=>[c(" Cancel ")]),_:1}),t(m,{class:h(["ms-3",{"opacity-25":o(e).processing}]),disabled:o(e).processing,onClick:d},{default:a(()=>[c(" Delete Account ")]),_:1},8,["class","disabled"])])])]),_:1},8,["show"])]))}};export{O as default};