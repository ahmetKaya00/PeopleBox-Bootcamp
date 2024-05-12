import React, { Component } from 'react'
import { Button, Table } from 'reactstrap'

export default class ProductList extends Component {

  render() {
    return (
      <div>
        {this.props.info.title} - {this.props.currentCategory}
        <Table>
          <thead>
            <tr>
              <th>#</th>
              <th>Product Name</th>
              <th>Quantity Per Unit</th>
              <th>Unit Price</th>
              <th>Unit is Stock</th>
            </tr>
          </thead>
          <tbody>
            {this.props.products.map(product => (
              <tr key={product.id}>
              <td >{product.id}</td>
              <td>{product.productName}</td>
              <td>{product.quantityPerUnit}</td> 
              <td>{product.unitPrice}</td>
              <td>{product.unitsInStock}</td>
              <td><Button onClick={()=>this.props.addToCart(product)} color='primary'>Add</Button></td>
            </tr>
            ))}
            
          </tbody>
        </Table>
      </div>
    )
  }
}
