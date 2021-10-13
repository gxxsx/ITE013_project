import { StatusBar } from 'expo-status-bar';
import React from 'react';
import { StyleSheet, Text, View, TextInput, TouchableOpacity } from 'react-native';



const Register = () =>  (
    <View style={{ flex: 1, justifyContent: 'center', alignItems: 'center' }}>
      <View style={{justifyContent: 'center', alignItems: 'center', borderColor:'#000000', borderWidth: 3, width:400, height: 500 }}>
      <Text style={{fontSize: 60}}>Register</Text>
      <Text></Text>
      <Text>First Name:</Text>
      <TextInput  placeholder="First name" textAlign={'center'} />

      <Text>Middle Name:</Text>
      <TextInput  placeholder="Middle name" textAlign={'center'} />

      <Text>Last Name:</Text>
      <TextInput  placeholder="Last name" textAlign={'center'} />

      <Text>Address:</Text>
      <TextInput  placeholder="Address" textAlign={'center'} />
      
      <Text>Contact No.:</Text>
      <TextInput  placeholder="Contact number" keyboardType="number-pad" textAlign={'center'} />
      
      <Text>Password:</Text>
      <TextInput  placeholder="Password" secureTextEntry={true} textAlign={'center'} />
      <TouchableOpacity>
        <Text>
          CONTINUE
        </Text>
      </TouchableOpacity>
      <TouchableOpacity>
        <Text>
          LOGIN
        </Text>
      </TouchableOpacity>
      </View>
    </View>
  );

export default Register