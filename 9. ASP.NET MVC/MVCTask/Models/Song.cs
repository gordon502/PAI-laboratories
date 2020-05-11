using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.ComponentModel.DataAnnotations;

namespace MVCTask.Models
{
    public class Song
    {
        public int id { get; set; }

        [Required(ErrorMessage = "Name is Required")]
        [StringLength(100, ErrorMessage = "Maximal length of the name of a song is 100 characters!")]
        public String Name { get; set; }

        [Required(ErrorMessage = "Artist is Required")]
        [StringLength(30, ErrorMessage = "Maximal length of the artist name is 30 characters!")]
        public String Artist { get; set; }

        public int GenreId { get; set; }

        public Song() { }

        public Song(int id, String Name, String Artist, int GenreId)
        {
            this.id = id;
            this.Name = Name;
            this.Artist = Artist;
            this.GenreId = GenreId;
        }
    }
}