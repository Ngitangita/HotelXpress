
import Featured from "../../Commone/featured/Featured";
import FeaturedProperties from "../../Commone/featuredProperties/FeaturedProperties";
import Footer from "../../Commone/footer/Footer";
import Header from "../../Commone/header/Header";
import Navbar from "../../Commone/navbar/Navbar"
import PropertyList from "../../Commone/propertyList/PropertyList";
import "./hotel.css";

const Hotel = () => {
  return (
    <div>
      <Navbar />
      <Header type="list"/>
      <div className="homeContainer">
        <Featured/>
        <h1 className="homeTitle">Parcourir par type de propriété</h1>
        <PropertyList/>
        <h1 className="homeTitle"  id="body">Les clients ont adoré les maisons</h1>
        <FeaturedProperties/>
        <Footer/>
      </div>
    </div>
  );
};

export default Hotel;
