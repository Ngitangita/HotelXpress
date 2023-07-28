import "./chambres.css";
import Navbar from "../../Commone/navbar/Navbar";
import Header from "../../Commone/header/Header";

import { useState } from "react";
import SearchItem from "../../Commone/searchItem/SearchItem";

const Chambres = () => {
  const [destination] = useState("");
  const setOptions = useState(" ");

  return (
    <div>
      <Navbar />
      <Header type="list" />
      <div className="listContainer">
        <div className="listWrapper">
          <div className="listSearch">
            <h1 className="lsTitle">Rechercher</h1>
            <div className="lsItem">
              <label>Destination</label>
              <input placeholder={destination} type="text" />
            </div>
            <div className="lsItem">
              <label>Options</label>
              <div className="lsOptions">
                <div className="lsOptionItem">
                  <span className="lsOptionText">
                  Prix min <small>par nuit</small>
                  </span>
                  <input type="number" className="lsOptionInput" />
                </div>
                <div className="lsOptionItem">
                  <span className="lsOptionText">
                  Prix min <small>par nuit</small>
                  </span>
                  <input type="number" className="lsOptionInput" />
                </div>
                <div className="lsOptionItem">
                  <span className="lsOptionText">Adulte</span>
                  <input
                    type="number"
                    min={1}
                    className="lsOptionInput"
                    placeholder={setOptions.adult}
                  />
                </div>
                <div className="lsOptionItem">
                  <span className="lsOptionText">Enfants</span>
                  <input
                    type="number"
                    min={0}
                    className="lsOptionInput"
                    placeholder={setOptions.children}
                  />
                </div>
                <div className="lsOptionItem">
                  <span className="lsOptionText">Chambre</span>
                  <input
                    type="number"
                    min={1}
                    className="lsOptionInput"
                    placeholder={setOptions.room}
                  />
                </div>
              </div>
            </div>
            <button>Rechercher</button>
          </div>
          <div className="listResult"  id="body">
            <SearchItem />
            <SearchItem />
            <SearchItem />
            <SearchItem />
            <SearchItem />
            <SearchItem />
            <SearchItem />
            <SearchItem />
            <SearchItem />
          </div>
        </div>
      </div>
    </div>
  );
};

export default Chambres;
