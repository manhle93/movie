<template>
<div>
	<p>{{nhap}}</p>
	<input type="" name="" v-model='nhap'>
	<button @click='truyen'>Nhập</button>
	<br>
	<div v-for="item in data">
		{{item}}
	</div>
</div>
</template>

<script>
	export default{
	// components:{},
	// props:[//*truyenbien*//],
	data:function(){
		return{
			nhap: 'mcammc',
			data: [],
		}
		},
		methods: {
			truyen: function(){

			 this.data.push(this.nhap)}
		}
	// 	methods{
	// //ben trong chua cac lenh function
	// 	},
	// 	mounted: function(){
	// 	//sự kiện khi load trang
	// 	}
	}
</script>
