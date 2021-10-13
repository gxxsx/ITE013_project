import { StatusBar } from 'expo-status-bar';
import React from 'react';
import { SafeAreaView, StyleSheet, Text, View } from 'react-native';

import { SliderBox } from "react-native-image-slider-box";
import Sections from '../../components/sections/sections';


import { createStackNavigator } from '@react-navigation/stack';

const Stack = createStackNavigator();

const HomeScreen = () =>  (
  <>
 
    <View style={{ flex: 1, justifyContent: 'center', backgroundColor:"#ffffff", }}>
      
      <Text style={styles.heading}>ORAGON</Text>
      <Text style={styles.text}>BOAT RESERVATION</Text>
      <Sections text = "Caramoan" subtext = "Safe and Affordable, Book Now!" buttontext="Register Now" imageLink={{uri: "https://live.staticflickr.com/3675/12405674394_1e82631bce_b.jpg"}}/>
      <Sections text = "Destinations" subtext = "Its More Fun in Caramoan" buttontext="View" imageLink={{uri: "https://www.thewanderlustwithin.com/wp-content/uploads/2019/01/IMG_5300-1024x767.jpg"}}/>
      <Sections text = "Price list" subtext = "Its More Fun in Caramoan" buttontext="View" imageLink={{uri: "https://live.staticflickr.com/3675/12405674394_1e82631bce_b.jpg"}}/>

    </View>

   </>
  );
  const styles = StyleSheet.create(
 { heading:{
    color: "#020a54",
    fontSize: 60,

    fontWeight: "bold",
    textAlign: "left",
    marginTop:50,
    marginLeft:10,
  },
  text: {
    color: "black",
    fontSize: 20,
    
    fontWeight: "bold",

    textAlign: "left",

    marginLeft:20,
 
  },}
  )
export default HomeScreen