import React, { Component } from 'react'
import Navi from "./Navi";
import CategoryList from "./CategoryList";
import ProductList from "./ProductList";
import { Col, Container, Row } from "reactstrap";
import alertify from 'alertifyjs';
import { Route, Routes } from 'react-router-dom';
import NotFound from './NotFound';
import CartList from './CartList';
import FormDemo1 from './FormDemo1';
import FormDemo2 from './FormDemo2';


export default class App extends Component {
  state={currentCategory:"", products:[], cart:[] }
  changeCategory =(category)=>{
    this.setState({currentCategory: category.categoryName});
    this.getProducts(category.id);
  };
  componentDidMount(){
    this.getProducts();
  }
  getProducts =(categoryId)=>{

    let url ="http://localhost:3000/products";
    if(categoryId){
      url+="?categoryId="+categoryId;
    }
    fetch(url)
    .then(response=>response.json())
    .then(data=>this.setState({products:data}))
  }

  addToCart = (product)=>{
    let newCart = this.state.cart;
    var addedItem = newCart.find(c=>c.product.id === product.id)
    if(addedItem){
      addedItem.quantity+=1;
    }
    else{
      newCart.push({product:product,quantity:1})
    }
    this.setState({cart:newCart});
    alertify.success(product.productName + " added to cart!");

  }

  removeFromCart=(product)=>{
    let newCart = this.state.cart.filter(c=>c.product.id!==product.id)
    this.setState({cart:newCart})
    alertify.error(product.productName + " removeto cart!");
  }
    render(){
     let categoryInfo = {title:"Category List", Area:"Category Area"};
     let productInfo = {title:"Product List"};
      return (
        <div>
          <Container>
            <Row>
              <Navi removeFromCart={this.removeFromCart} cart={this.state.cart} />
            </Row>
            <Row>
              <Col xs="3">
                <CategoryList currentCategory={this.state.currentCategory} changeCategory={this.changeCategory} info={categoryInfo} />
              </Col>
              <Col xs="9">
                <Routes>
                  <Route path='/' element={
                    <ProductList
                    products={this.state.products}
                    addToCart={this.addToCart}
                     currentCategory={this.state.currentCategory} 
                     changeCategory={this.changeCategory} 
                     info={productInfo}/>                 
                  }/>
                  <Route path='*' element={<NotFound/>}/>
                  <Route path='/cart' element={<CartList
                    cart={this.state.cart}
                    removeFromCart={this.removeFromCart}
                  />}/>
                  <Route path='form1' element={<FormDemo1/>}/>
                  <Route path='/form2' element={<FormDemo2/>}/>
                </Routes>


                
              </Col>
            </Row>
          </Container>
        </div>
      );
    }
}

