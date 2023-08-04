import React from 'react'
import "./reserver.css"
import {
  faBed,
  faCalendarDays,
  faPerson
} from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { DateRange } from "react-date-range";
import { useState } from "react";
import "react-date-range/dist/styles.css"; // main css file
import "react-date-range/dist/theme/default.css"; // theme css file
import { format } from "date-fns";
import { useNavigate } from "react-router-dom";

const Reserver = ({type}) => {
    const [destination, setDestination] = useState("");
    const [openDate, setOpenDate] = useState(false);
    const [date, setDate] = useState([
      {
        startDate: new Date(),
        endDate: new Date(),
        key: "selection",
      },
    ]);
    const [openOptions, setOpenOptions] = useState(false);
    const [options, setOptions] = useState({
      adult: 1,
      children: 0,
      room: 1,
    });
  
    const navigate = useNavigate();
  
    const handleOption = (name, operation) => {
      setOptions((prev) => {
        return {
          ...prev,
          [name]: operation === "i" ? options[name] + 1 : options[name] - 1,
        };
      });
    };
  
    const handleSearch = () => {
      navigate("/signup", { state: { destination, date, options } });
  };

  return (
    <div className="reserver"> 
       <div
          className={
            type === "list" ? "reservationContainer listMode" : "reservationContainer"
          }
        >
          {type !== "list" && (
            <>
              <div className="reservationSearch">
                <div className="reservationSearchItem">
                  <FontAwesomeIcon icon={faBed} className="reservationIcon" />
                  <input
                  id='reservationSearchInput'
                    type="text"
                    placeholder="Où allez-vous?"
                    className="reservationSearchInput"
                    onChange={(e) => setDestination(e.target.value)}
                  />
                </div>
                <div className="reservationSearchItem">
                  <FontAwesomeIcon icon={faCalendarDays} className="reservationIcon" />
                  <span
                    onClick={() => setOpenDate(!openDate)}
                    className="reservationSearchText"
                  >{`${format(date[0].startDate, "MM/dd/yyyy")} to ${format(
                    date[0].endDate,
                    "MM/dd/yyyy"
                  )}`}</span>
                  {openDate && (
                    <DateRange
                      editableDateInputs={true}
                      onChange={(item) => setDate([item.selection])}
                      moveRangeOnFirstSelection={false}
                      ranges={date}
                      className="date"
                      minDate={new Date()}
                    />
                  )}
                </div>
                <div className="reservationSearchItem">
                  <FontAwesomeIcon icon={faPerson} className="reservationIcon" />
                  <span
                    onClick={() => setOpenOptions(!openOptions)}
                    className="reservationSearchText"
                  >{`${options.adult} adult · ${options.children} children · ${options.room} room`}</span>
                  {openOptions && (
                    <div className="options">
                      <div className="optionItem">
                        <span className="optionText">Adulte</span>
                        <div className="optionCounter">
                          <button
                            disabled={options.adult <= 1}
                            className="optionCounterButton"
                            onClick={() => handleOption("adult", "d")}
                          >
                            -
                          </button>
                          <span className="optionCounterNumber">
                            {options.adult}
                          </span>
                          <button
                            className="optionCounterButton"
                            onClick={() => handleOption("adult", "i")}
                          >
                            +
                          </button>
                        </div>
                      </div>
                      <div className="optionItem">
                        <span className="optionText">Enfant</span>
                        <div className="optionCounter">
                          <button
                            disabled={options.children <= 0}
                            className="optionCounterButton"
                            onClick={() => handleOption("children", "d")}
                          >
                            -
                          </button>
                          <span className="optionCounterNumber">
                            {options.children}
                          </span>
                          <button
                            className="optionCounterButton"
                            onClick={() => handleOption("children", "i")}
                          >
                            +
                          </button>
                        </div>
                      </div>
                      <div className="optionItem">
                        <span className="optionText">Chambre</span>
                        <div className="optionCounter">
                          <button
                            disabled={options.room <= 1}
                            className="optionCounterButton"
                            onClick={() => handleOption("room", "d")}
                          >
                            -
                          </button>
                          <span className="optionCounterNumber">
                            {options.room}
                          </span>
                          <button
                            className="optionCounterButton"
                            onClick={() => handleOption("room", "i")}
                          >
                            +
                          </button>
                        </div>
                      </div>
                    </div>
                  )}
                </div>
                <div className="reservationSearchItem">
                  <button className="reservationBtn" onClick={handleSearch}>
                    Rechercher
                  </button>
                </div>
              </div>
            </>
          )}
        </div>
      </div>
  )
}

export default Reserver