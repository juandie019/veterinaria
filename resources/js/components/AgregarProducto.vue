<template>
    <div id="app">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <div  @submit.prevent = "buscarProducto()">
                                <div class="row">
                                    <div class ="col-md-3 form-inline text-primary">
                                        <div class="text-left">Folio:</div>
                                       <div v-text="folio" class="text-right"></div>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" v-model="id_producto" class="form-control" name="id_producto"  required autocomplete="id_producto" autofocus placeholder="Id de producto">
                                    </div>
                                    <div class="col-md-3">
                                        <input id="cantidad" v-model="cantidad" type="text" class="form-control" name="cantidad"  required autocomplete="cantidad" autofocus placeholder="Cantidad de productos">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="submit" class="btn btn-primary form-control"  value = "Agregar producto" @click = "buscarProducto">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Id producto</th>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>Cantidad</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tr v-for="(producto, index) in productos" :key="index">
                                    <td>{{producto['id_producto']}}</td>
                                    <td>{{producto['nombre']}}</td>
                                    <td>{{producto['precio']}}</td>
                                    <td>{{producto['cantidad']}}</td>
                                    <td>{{producto['total']}}</td>
                                </tr>
                                <tr class="table-info">
                                    <th></th>
                                    <th></th>
                                    <th>Total</th>
                                    <th>{{this.total_productos}}</th>
                                    <th>{{this.total}}</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" name="id_cliente" required autocomplete="id_cliente" autofocus placeholder="Id de Cliente">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-primary form-control">
                                          Buscar cliente
                                        </button>
                                    </div>
                                    <div class="col-md-2 offset-md-6">
                                        <input type="submit" class="btn btn-primary form-control" @click = "registrarVenta" value="Finalizar Venta">
                                    </div>
                               </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        props: ['folioAux'],

        data(){
            return{
                id_producto: '1010',
                cantidad: '1',
                total: 0,
                total_productos: 0,
                productos: [],
                id_cliente: 'publico',
                folio: ''
            }
        },


        mounted() {
            console.log('Component mounted.')
            this.folio = this.folioAux;
        },

        methods: {
          buscarProducto(){
            console.log(this.id_producto + " " + this.cantidad);

             axios.post('/producto/' + this.id_producto)
             .then(response => {
                    if(response.data == ""){
                        swal("No se encontro el producto", "ID: " + this.id_producto, "error");
                        this.id_producto = '';
                    }else{
                        this.productos.push({
                            id_producto: response.data['id_producto'],
                            nombre: response.data['nombre'],
                            precio: response.data['precio'],
                            cantidad: this.cantidad,
                            total: response.data['precio'] * this.cantidad
                        })

                        this.total += response.data['precio'] * this.cantidad;
                        this.total_productos += parseInt(this.cantidad);
                    }
                })
             .catch(function (error){
               console.log(error);
             })
          },

          registrarVenta(){
              axios.post('/api/venta/store',
              {data:{lista:this.productos, id_cliente:this.id_cliente,
               cantidad:this.total_productos, total:this.total, folio:this.folio}
              })
              .then(response => {
                  //recuperar errores
                  swal("Venta registrada", "Con Exito", "success");

                  this.folio = response.data;
                  this.productos = [];
                  this.cliente = 'publico';
                  this.cantidad = '1';
                  this.total_productos = '0';
                  this.total = '0';
                  this.id_producto = '';
               })
          }
        }

    }
</script>
