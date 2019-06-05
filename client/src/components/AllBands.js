import React, { Component } from 'react';
import axios from 'axios';

class AllBands extends Component {
    state={
        bands:[]
    }
    componentDidMount(){
        let apiUrl= 'http://localhost:8080/api/all_bands_info.php'
        const url = apiUrl
        axios.get(url).then(response => response.data)
        .then((data) => {
          this.setState({ bands: data })
          console.log(this.state.bands)
         })
    }
    render() {
        let bands = this.state.bands;
        return (
            <div>
                <h1>Music Bands</h1>
                {bands && bands.map(item=>{
                  return  (<div className="bands">
                    <h2>{item.name}</h2>
                    <p><b>Genre</b>: {item.genre}</p>
                    <h3>Albums</h3>
                    {item.albums.map(album=>{
                        return(
                            <p>{album.name}</p>
                        )
                    })}
                    </div>)
                })}
            </div>
        );
    }
}

export default AllBands;