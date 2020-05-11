using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Web;


namespace MVCTask.Models
{
    public class Genre
    {
        public int id { get; set; }

        [Required(ErrorMessage = "Name is Required")]
        [StringLength(15, ErrorMessage = "Maximal length of the name of a Genre is 15 characters!")]
        public String Name { get; set; }
        public ICollection<Song> songs { get; set; }
    }
}