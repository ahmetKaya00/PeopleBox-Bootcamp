import React, { Component } from 'react'
import { Table } from 'reactstrap'

export default class ProductList extends Component {
  render() {
    return (
      <div>
        {this.props.info.title} - {this.props.currentCategory}
        <Table>
          <thead>
            <tr>
              <th>#</th>
              <th>First Name</th>
              <th>First Name</th>
              <th>First Name</th>
            </tr>
          </thead>
          <tbody>
            {this.props.products.map(product => (
              <tr key={product.id}>
              <td >{product.id}</td>
              <td>{product.productName}</td>
              <td>{product.productName}</td> 
              <td>{product.productName}</td>
            </tr>
            ))}
            
          </tbody>
        </Table>
      </div>
    )
  }
}
