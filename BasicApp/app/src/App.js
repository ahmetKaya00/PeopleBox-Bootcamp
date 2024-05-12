import React, { Component } from 'react'
import Navi from "./Navi";
import CategoryList from "./CategoryList";
import ProductList from "./ProductList";
import { Col, Container, Row } from "reactstrap";

export default class App extends Component {
  state={currentCategory:"", products:[] }
  changeCategory =(category)=>{
    this.setState({currentCategory: category.categoryName})
  };
  componentDidMount(){
    this.getProducts();
  }
  getProducts =()=>{
    fetch("http://localhost:3000/products")
    .then(response=>response.json())
    .then(data=>this.setState({products:data}))
  }
    render(){
     let categoryInfo = {title:"Category List", Area:"Category Area"};
     let productInfo = {title:"Product List"};
      return (
        <div>
          <Container>
            <Row>
              <Navi />
            </Row>
            <Row>
              <Col xs="4">
                <CategoryList currentCategory={this.state.currentCategory} changeCategory={this.changeCategory} info={categoryInfo} />
              </Col>
              <Col xs="8">
                <ProductList
                products={this.state.products}
                 currentCategory={this.state.currentCategory} 
                 changeCategory={this.changeCategory} 
                 info={productInfo}/>
              </Col>
            </Row>
          </Container>
        </div>
      );
    }
}

