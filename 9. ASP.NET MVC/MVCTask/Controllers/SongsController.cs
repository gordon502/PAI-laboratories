using System;
using System.Collections.Generic;
using System.Data;
using System.Data.Entity;
using System.Linq;
using System.Net;
using System.Web;
using System.Web.Mvc;
using MVCTask.Models;

namespace MVCTask.Controllers
{
    public class SongsController : Controller
    {
        private MusicDbContext db = new MusicDbContext();

        // GET: Songs
        public ActionResult Index()
        {
            if (Request.IsAjaxRequest())
            {

                return PartialView("_SongsList", db.Songs.ToList());
            }
            return View(db.Songs.ToList());
        }

        // GET: Songs/Create
        public ActionResult Create()
        {
            ViewBag.Genres = db.Genres.ToList();
            return View();
        }

        // POST: Songs/Create
        // To protect from overposting attacks, please enable the specific properties you want to bind to, for 
        // more details see http://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Create([Bind(Include = "id,Name,Artist,GenreId")] Song song)
        {
            if (ModelState.IsValid)
            {
                ViewBag.Genres = db.Genres.ToList();
                db.Songs.Add(song);
                db.SaveChanges();
                return RedirectToAction("Index");
            }

            return View(song);
        }

        // GET: Songs/Edit/5
        public ActionResult Edit(int? id)
        {
            ViewBag.Genres = db.Genres.ToList();
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            Song song = db.Songs.Find(id);
            if (song == null)
            {
                return HttpNotFound();
            }
            return View(song);
        }

        // POST: Songs/Edit/5
        // To protect from overposting attacks, please enable the specific properties you want to bind to, for 
        // more details see http://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Edit([Bind(Include = "id,Name,Artist,GenreId")] Song song)
        {
            ViewBag.Genres = db.Genres.ToList();
            if (ModelState.IsValid)
            {
                db.Entry(song).State = EntityState.Modified;
                db.SaveChanges();
                return RedirectToAction("Index");
            }
            return View(song);
        }

        // Delete: Songs/Delete/5
        [HttpDelete, ActionName("Delete")]
        public ActionResult Delete(int id)
        {
            Song song = db.Songs.Find(id);
            db.Songs.Remove(song);
            db.SaveChanges();
            return RedirectToAction("Index");
        }

        protected override void Dispose(bool disposing)
        {
            if (disposing)
            {
                db.Dispose();
            }
            base.Dispose(disposing);
        }
    }
}
