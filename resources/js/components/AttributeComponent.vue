<template>
    <div>
        <div class="form-group">
            <label>دسته بندی مربوطه</label>

            <select name="categories[]"  class="form-control" multiple="true" v-model="categories_selected" @onchange>
<option v-for="category in categories" :value="category.id">{{category.name}}</option>
            </select>
        </div>

        <div class="form-group">
            <label>برند</label>
            <select name="brand"  class="form-control">


                <option v-for="brand in brands" :value="brand.id">{{brand.title}}</option>

            </select>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                categories:[],
                categories_selected:[],
                flag:false,
                attributes:[],
                selectedAttribute: [],
                computedAttribute: []
            }
        },
        props: ['brands', 'product'],
        mounted() {
            axios.get('/api/categories').then(res =>{
                this.getAllChildren(res.data.categories, 0)
            }).catch(err=>{
                console.log (err)
            })
            if(this.product){
                console.log(this.product)
                for(var i=0; i<this.product.categories.length; i++){
                    this.categories_selected.push(this.product.categories[i].id)
                }
                for(var i=0; i<this.product.attribute_values.length; i++){
                    this.selectedAttribute.push({
                        'index': i,
                        'value': this.product.attribute_values[i].id
                    })
                    this.computedAttribute.push(this.product.attribute_values[i].id)
                }
                const load = 'ok'
                this.onChange(null, load);
            }
        },
        methods: {
            getAllChildren: function(currentValue, level){
                for(var i=0; i< currentValue.length; i++){
                    var current = currentValue[i];
                    this.categories.push({
                        id: current.id,
                        name: Array(level + 1).join("----") + " " + current.name
                    })
                    if(current.children_recursive && current.children_recursive.length > 0){
                        this.getAllChildren(current.children_recursive, level + 1)
                    }
                }
            },
            onChange: function(event, load){
                this.flag = false;
                axios.post('/api/categories/attribute', this.categories_selected).then(res =>{
                    if(this.product && load == null){
                        this.computedAttribute = []
                        this.selectedAttribute = []
                    }
                    this.attributes = res.data.attributes
                    this.flag = true
                }).catch(err => {
                    console.log(err)
                    this.flag = false
                })

            },
            addAttribute: function(event, index){
                for(var i=0; i<this.selectedAttribute.length; i++){
                    var current = this.selectedAttribute[i];
                    if(current.index == index){
                        this.selectedAttribute.splice(i, 1)
                    }
                }
                this.selectedAttribute.push({
                    'index': index,
                    'value': event.target.value
                })
                this.computedAttribute = []
                for(var i=0; i<this.selectedAttribute.length; i++){
                    this.computedAttribute.push(this.selectedAttribute[i].value)
                }
            },
        }
    }
</script>

<style scoped>

</style>