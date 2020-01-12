<template>
    <div>
        <div class="form-group">
            <label>دسته بندی مربوطه</label>

            <select name="categories[]"  class="form-control" multiple>
<option v-for="category in categories" :value="category.id">{{category.name}}</option>
                <!--@foreach($categories as $category)-->

                <!--<option value="{{$category->id}}">{{$category->name}}</option>-->

                <!--@if(count($category->childRecursive)>0)-->

                <!--@include('viewbackend.partials.category',['categories'=>$category->childRecursive,'level'=>1])-->
                <!--;-->

                <!--@endif-->
                <!--@endforeach-->
            </select>
        </div>

        <!--<div class="form-group">-->
            <!--<label>برند</label>-->
            <!--<select name="brand"  class="form-control">-->
                <!--@foreach($brands as $brand)-->

                <!--<option value="{{$brand->id}}">{{$brand->title}}</option>-->
                <!--@endforeach-->
            <!--</select>-->
        <!--</div>-->
    </div>
</template>

<script>
    export default {
        data(){
            return{
                categories:[]
            }
        },
        mounted() {
            axios.get('api/categories').then(
                res=>{

                    this.getAllChildren(res.data.categories,0)
                }
            )
                .catch(
                    err=>{
                    console.log(err)
                })
        },
        methods:{
            getAllChildren:function (currentValue,level) {
                for (var i=0;i=currentValue.length;i++) {
                    var current=currentValue[i];
                    this.categories.push({
                            id: current.id,
                            name:current.name
                        }
                    )
                    if (current.childRecursive && current.childRecursive.length>0){
                        this.getAllChildern(current.childRecursive,level+1)
                    }
                }


            }
        }
    }
</script>

<style scoped>

</style>