import alertify from 'alertifyjs';
import React, { Component } from 'react'
import { Button, Form, FormGroup, Input, Label } from 'reactstrap';

export default class FormDemo2 extends Component {
    state = {email:"",password:"",city:"",description:""}

    handleChange=event=>{
        let name = event.target.name;
        let value = event.target.value;
        this.setState({[name]:value})
    }
    hadleSubmit = event =>{
        event.preventDefault();
        alertify.success(this.state.email + " added to db!");
        alertify.success(this.state.password + " added to db!");
        alertify.success(this.state.city + " added to db!");
        alertify.success(this.state.description + " added to db!");

    }
  render() {
    return (
      <div>
        <Form onSubmit={this.hadleSubmit}>
            <FormGroup>
            <Label for="email">Email</Label>
            <Input
            type='email'
            name='email'
            id='email'
            placeholder='Enter email'
            onChange={this.handleChange}/>
            </FormGroup>
            <FormGroup>
            <Label for="password">Email</Label>
            <Input
            type='password'
            name='password'
            id='password'
            placeholder='Enter password'
            onChange={this.handleChange}/>
            </FormGroup>
            <FormGroup>
            <Label for="description">Email</Label>
            <Input
            type='textarea'
            name='description'
            id='description'
            placeholder='Enter description'
            onChange={this.handleChange}/>
            </FormGroup>
            <FormGroup>
            <Label for="city">Email</Label>
            <Input
            type='select'
            name='city'
            id='city'
            placeholder='Enter city'
            onChange={this.handleChange}>
                <option>Ankara</option>
                <option>Mersin</option>
                <option>İstanbul</option>
            </Input>
            </FormGroup>
            <Button type='submit'>Save</Button>
        </Form>
      </div>
    )
  }
}
