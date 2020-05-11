using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Data.Entity;

namespace MVCTask.Models
{
    public class MusicDbContext : DbContext
    {
        public DbSet<Song> Songs { get; set; }
        public DbSet<Genre> Genres { get; set; }
    }
}